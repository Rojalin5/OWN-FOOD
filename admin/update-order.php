<?php

session_start();

require_once("../config/db.php");


// Admin protection
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}


// Only allow POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: orders.php");
    exit();
}


// Get form data
$order_id = (int) ($_POST["order_id"] ?? 0);

$order_status = $_POST["order_status"] ?? "";


// Allowed statuses
$allowed_statuses = [
    "Pending",
    "Preparing",
    "Out for Delivery",
    "Delivered"
];


// Validate order ID
if ($order_id <= 0) {
    die("Invalid order ID.");
}


// Validate status
if (!in_array($order_status, $allowed_statuses, true)) {
    die("Invalid order status.");
}


// Update order
$stmt = $conn->prepare(
    "UPDATE orders
     SET order_status = ?
     WHERE id = ?"
);

$stmt->bind_param(
    "si",
    $order_status,
    $order_id
);

$stmt->execute();


// Go back to orders
header("Location: orders.php");
exit();

?>