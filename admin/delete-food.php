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


// Check food ID
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: foods.php");
    exit();
}


$food_id = (int) $_GET["id"];


// Delete food
$stmt = $conn->prepare(
    "DELETE FROM menu_items WHERE id = ?"
);

$stmt->bind_param("i", $food_id);


if ($stmt->execute()) {

    header("Location: foods.php");
    exit();

} else {

    die("Unable to delete food item.");
}

?>