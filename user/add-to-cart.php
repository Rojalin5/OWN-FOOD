<?php

session_start();

require_once("../config/db.php");

// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

// Only allow POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION["user_id"];
    $food_id = (int) $_POST["food_id"];

    // Check whether this food already exists in this user's cart
    $check = $conn->prepare(
        "SELECT id, quantity
         FROM cart
         WHERE user_id = ? AND food_id = ?"
    );

    $check->bind_param("ii", $user_id, $food_id);

    $check->execute();

    $result = $check->get_result();

    // Already in cart
    if ($result->num_rows > 0) {

        $cart_item = $result->fetch_assoc();

        $new_quantity = $cart_item["quantity"] + 1;

        $update = $conn->prepare(
            "UPDATE cart
             SET quantity = ?
             WHERE id = ?"
        );

        $update->bind_param(
            "ii",
            $new_quantity,
            $cart_item["id"]
        );

        $update->execute();

    }

    // Not in cart yet
    else {

        $insert = $conn->prepare(
            "INSERT INTO cart
            (user_id, food_id, quantity)
            VALUES (?, ?, 1)"
        );

        $insert->bind_param(
            "ii",
            $user_id,
            $food_id
        );

        $insert->execute();
    }

    // Go back to order page
    header("Location: order_user.php");
    exit();
}
?>