<?php

session_start();
require_once("../config/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION["user_id"];
    $cart_id = (int) $_POST["cart_id"];
    $action = $_POST["action"];

    // Get current cart item
    $stmt = $conn->prepare(
        "SELECT quantity
         FROM cart
         WHERE id = ? AND user_id = ?"
    );

    $stmt->bind_param("ii", $cart_id, $user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $item = $result->fetch_assoc();
        $quantity = $item["quantity"];

        // Increase
        if ($action == "increase") {

            $quantity++;

            $update = $conn->prepare(
                "UPDATE cart
                 SET quantity = ?
                 WHERE id = ? AND user_id = ?"
            );

            $update->bind_param(
                "iii",
                $quantity,
                $cart_id,
                $user_id
            );

            $update->execute();
        }

        // Decrease
        elseif ($action == "decrease") {

            if ($quantity > 1) {

                $quantity--;

                $update = $conn->prepare(
                    "UPDATE cart
                     SET quantity = ?
                     WHERE id = ? AND user_id = ?"
                );

                $update->bind_param(
                    "iii",
                    $quantity,
                    $cart_id,
                    $user_id
                );

                $update->execute();
            }
        }

        // Remove completely
        elseif ($action == "remove") {

            $delete = $conn->prepare(
                "DELETE FROM cart
                 WHERE id = ? AND user_id = ?"
            );

            $delete->bind_param(
                "ii",
                $cart_id,
                $user_id
            );

            $delete->execute();
        }
    }

    header("Location: cart_user.php");
    exit();
}
?>