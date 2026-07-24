<?php

session_start();

require_once("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Find user using email
    $stmt = $conn->prepare(
        "SELECT id, full_name, email, password, role 
         FROM users 
         WHERE email = ?"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["full_name"] = $user["full_name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];

            header("Location: ../user/dashboard.php");
            exit();

        } else {

            echo "Incorrect password";

        }

    } else {

        echo "User not found";

    }

}
?>