<?php

session_start();

require_once("../config/db.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../log-in.php");
    exit();
}

if (isset($_GET["id"])) {

    $food_id = (int) $_GET["id"];

    $stmt = $conn->prepare(
        "DELETE FROM menu_items WHERE id = ?"
    );

    $stmt->bind_param("i", $food_id);
    $stmt->execute();
}

header("Location: manage-menu.php");
exit();

?>