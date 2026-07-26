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

$message = "";
$error = "";


// Form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $category = trim($_POST["category"]);
    $price = $_POST["price"];
    $is_available = $_POST["is_available"];


    // Basic validation
    if (
        empty($name) ||
        empty($category) ||
        empty($price)
    ) {

        $error = "Please fill all required fields.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO menu_items
            (
                name,
                description,
                category,
                price,
                is_available
            )
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssdi",
            $name,
            $description,
            $category,
            $price,
            $is_available
        );


        if ($stmt->execute()) {

            header("Location: foods.php");
            exit();

        } else {

            $error = "Unable to add food item.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Food | OwnFood Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

</head>

<body class="bg-light">


<!-- NAVBAR -->

<nav class="navbar bg-white border-bottom">

    <div class="container py-2">

        <a
            href="dashboard.php"
            class="navbar-brand fw-bold"
        >
            🍔 OwnFood Admin
        </a>


        <div>

            <a
                href="foods.php"
                class="btn btn-outline-dark btn-sm me-2"
            >
                Manage Food
            </a>

            <a
                href="../auth/logout.php"
                class="btn btn-outline-danger btn-sm"
            >
                Logout
            </a>

        </div>

    </div>

</nav>


<!-- CONTENT -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">


            <!-- HEADER -->

            <div class="mb-4">

                <a
                    href="foods.php"
                    class="text-decoration-none text-dark"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Food
                </a>

                <h2 class="fw-bold mt-3 mb-1">
                    Add New Food
                </h2>

                <p class="text-muted">
                    Add a new item to the OwnFood menu.
                </p>

            </div>


            <!-- ERROR -->

            <?php if (!empty($error)) { ?>

                <div class="alert alert-danger">

                    <?php
                    echo htmlspecialchars($error);
                    ?>

                </div>

            <?php } ?>


            <!-- FORM -->

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <form method="POST">


                        <!-- FOOD NAME -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Food Name *
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Example: Chicken Burger"
                                required
                            >

                        </div>


                        <!-- DESCRIPTION -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Write a short description..."
                            ></textarea>

                        </div>


                        <!-- CATEGORY -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Category *
                            </label>

                            <select
                                name="category"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Category
                                </option>

                                <option value="Burger">
                                    Burger
                                </option>

                                <option value="Pizza">
                                    Pizza
                                </option>

                                <option value="Biryani">
                                    Biryani
                                </option>

                                <option value="Main Course">
                                    Main Course
                                </option>

                                <option value="Chinese">
                                    Chinese
                                </option>

                                <option value="Snacks">
                                    Snacks
                                </option>

                                <option value="Dessert">
                                    Dessert
                                </option>

                                <option value="Drinks">
                                    Drinks
                                </option>

                            </select>

                        </div>


                        <div class="row">


                            <!-- PRICE -->

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Price *
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            ₹
                                        </span>

                                        <input
                                            type="number"
                                            name="price"
                                            class="form-control"
                                            min="1"
                                            step="0.01"
                                            placeholder="199"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>


                            <!-- AVAILABILITY -->

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Availability
                                    </label>

                                    <select
                                        name="is_available"
                                        class="form-select"
                                    >

                                        <option value="1">
                                            Available
                                        </option>

                                        <option value="0">
                                            Unavailable
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>


                        <!-- BUTTONS -->

                        <div class="d-flex gap-2 mt-3">

                            <button
                                type="submit"
                                class="btn btn-success"
                            >

                                <i class="bi bi-plus-lg"></i>

                                Add Food

                            </button>


                            <a
                                href="foods.php"
                                class="btn btn-outline-secondary"
                            >
                                Cancel
                            </a>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


</body>
</html>