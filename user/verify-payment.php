<?php

session_start();

require_once("../config/db.php");
require_once("../config/razorpay.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: checkout.php");
    exit();
}


// Get Razorpay response
$razorpay_payment_id = $_POST["razorpay_payment_id"] ?? "";
$razorpay_order_id = $_POST["razorpay_order_id"] ?? "";
$razorpay_signature = $_POST["razorpay_signature"] ?? "";


// Check required values
if (
    empty($razorpay_payment_id) ||
    empty($razorpay_order_id) ||
    empty($razorpay_signature)
) {
    die("Invalid payment response.");
}


// IMPORTANT:
// Compare with Razorpay order ID we created on our server
if (
    !isset($_SESSION["razorpay_order_id"]) ||
    $_SESSION["razorpay_order_id"] !== $razorpay_order_id
) {
    die("Invalid Razorpay order.");
}


try {

    // VERIFY PAYMENT SIGNATURE
    $api->utility->verifyPaymentSignature([

        "razorpay_order_id" =>
            $_SESSION["razorpay_order_id"],

        "razorpay_payment_id" =>
            $razorpay_payment_id,

        "razorpay_signature" =>
            $razorpay_signature

    ]);

} catch (Exception $e) {

    die("Payment verification failed.");
}


// ------------------------------
// PAYMENT VERIFIED
// ------------------------------

$user_id = $_SESSION["user_id"];

$phone =
    $_SESSION["checkout_phone"] ?? "";

$delivery_address =
    $_SESSION["checkout_address"] ?? "";


// Get cart items again from database
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

    die("Cart is empty.");
}


$cart_items = [];

$total_amount = 0;


while ($item = $result->fetch_assoc()) {

    $cart_items[] = $item;

    $total_amount +=
        $item["price"] *
        $item["quantity"];
}


// START DATABASE TRANSACTION

$conn->begin_transaction();


try {

    // CREATE ORDER

    $payment_method = "Online";

    $payment_method = "Online";
$payment_status = "Paid";

$order = $conn->prepare(
    "INSERT INTO orders
    (
        user_id,
        total_amount,
        delivery_address,
        phone,
        payment_method,
        payment_status,
        razorpay_payment_id
    )
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);

$order->bind_param(
    "idsssss",
    $user_id,
    $total_amount,
    $delivery_address,
    $phone,
    $payment_method,
    $payment_status,
    $razorpay_payment_id
);

$order->execute();

    // Get OwnFood order ID

    $order_id = $conn->insert_id;


    // SAVE ORDER ITEMS

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

        $food_id =
            $item["food_id"];

        $quantity =
            $item["quantity"];

        $price =
            $item["price"];


        $item_stmt->bind_param(
            "iiid",
            $order_id,
            $food_id,
            $quantity,
            $price
        );

        $item_stmt->execute();
    }


    // CLEAR CART

    $delete = $conn->prepare(
        "DELETE FROM cart
         WHERE user_id = ?"
    );

    $delete->bind_param(
        "i",
        $user_id
    );

    $delete->execute();


    // SAVE EVERYTHING

    $conn->commit();


    // Remove temporary checkout data

    unset($_SESSION["checkout_phone"]);
    unset($_SESSION["checkout_address"]);
    unset($_SESSION["razorpay_order_id"]);


    // SUCCESS PAGE

    header(
        "Location: order-success.php?order_id="
        . $order_id
    );

    exit();


} catch (Throwable $e) {

    $conn->rollback();

    die(
        "Unable to create order: "
        . $e->getMessage()
    );
}

?>