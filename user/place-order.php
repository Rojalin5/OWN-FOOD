<?php

session_start();

require_once("../config/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: checkout.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$phone = trim($_POST["phone"] ?? "");
$delivery_address = trim($_POST["delivery_address"] ?? "");
$payment_method = $_POST["payment_method"] ?? "";

if (empty($phone) || empty($delivery_address)) {
    die("Phone number and delivery address are required.");
}


if ($payment_method === "Online") {

    // Temporarily store checkout information
    $_SESSION["checkout_phone"] = $phone;
    $_SESSION["checkout_address"] = $delivery_address;

    // Do NOT create the OwnFood order yet.
    // First complete Razorpay payment.
    header("Location: razorpay-payment.php");
    exit();
}


$stmt = $conn->prepare(
    "SELECT 
        cart.food_id,
        cart.quantity,
        menu_items.price
     FROM cart
     JOIN menu_items
        ON cart.food_id = menu_items.id
     WHERE cart.user_id = ?"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: cart_user.php");
    exit();
}


// Store cart items
$cart_items = [];

$total_amount = 0;

while ($item = $result->fetch_assoc()) {

    $cart_items[] = $item;

    $total_amount +=
        $item["price"] * $item["quantity"];
}


// Start database transaction
$conn->begin_transaction();

try {

    // 1. Create COD order
    $stmt = $conn->prepare(
        "INSERT INTO orders
        (
            user_id,
            total_amount,
            delivery_address,
            phone,
            payment_method
        )
        VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "idsss",
        $user_id,
        $total_amount,
        $delivery_address,
        $phone,
        $payment_method
    );

    $stmt->execute();


    // Get newly created order ID
    $order_id = $conn->insert_id;


    // 2. Insert cart items into order_items
    $item_stmt = $conn->prepare(
        "INSERT INTO order_items
        (
            order_id,
            food_id,
            quantity,
            price
        )
        VALUES (?, ?, ?, ?)"
    );


    foreach ($cart_items as $item) {

        $food_id = $item["food_id"];
        $quantity = $item["quantity"];
        $price = $item["price"];

        $item_stmt->bind_param(
            "iiid",
            $order_id,
            $food_id,
            $quantity,
            $price
        );

        $item_stmt->execute();
    }


    // 3. Clear cart
    $delete_stmt = $conn->prepare(
        "DELETE FROM cart
         WHERE user_id = ?"
    );

    $delete_stmt->bind_param(
        "i",
        $user_id
    );

    $delete_stmt->execute();


    // Save everything
    $conn->commit();


    // Go to success page
    header(
        "Location: order-success.php?order_id=" . $order_id
    );

    exit();


} catch (Throwable $e) {

    $conn->rollback();

    die(
        "Order failed: " .
        $e->getMessage()
    );
}

?>