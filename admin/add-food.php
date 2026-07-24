<?php

session_start();

require_once("../config/db.php");

// Must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

// Must be admin
if ($_SESSION["role"] !== "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}

$message = "";

// Form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $price = (float) $_POST["price"];
    $category = trim($_POST["category"]);
    $image = trim($_POST["image"]);
    $is_available = (int) $_POST["is_available"];

    // Insert food
    $stmt = $conn->prepare(
        "INSERT INTO menu_items
        (name, description, price, category, image, is_available)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssdssi",
        $name,
        $description,
        $price,
        $category,
        $image,
        $is_available
    );

    if ($stmt->execute()) {

        header("Location: manage-menu.php");
        exit();

    } else {

        $message = "Failed to add food item.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Food | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <a href="manage-menu.php"
               class="text-decoration-none">

                <i class="bi bi-arrow-left"></i>
                Manage Menu

            </a>

            <div class="card border-0 shadow-sm mt-3">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-1">
                        Add New Food
                    </h2>

                    <p class="text-muted mb-4">
                        Add a new item to the OwnFood menu.
                    </p>

                    <?php if ($message != "") { ?>

                        <div class="alert alert-danger">

                            <?php echo $message; ?>

                        </div>

                    <?php } ?>


                    <form method="POST">


                        <!-- NAME -->

                        <div class="mb-3">

                            <label class="form-label">
                                Food Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Example: Chicken Burger"
                                required>

                        </div>


                        <!-- DESCRIPTION -->

                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="3"
                                placeholder="Food description"
                                required></textarea>

                        </div>


                        <!-- PRICE -->

                        <div class="mb-3">

                            <label class="form-label">
                                Price
                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                min="1"
                                step="0.01"
                                placeholder="199"
                                required>

                        </div>


                        <!-- CATEGORY -->

                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select
                                name="category"
                                class="form-select"
                                required>

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

                                <option value="Indian">
                                    Indian
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


                        <!-- IMAGE -->

                        <div class="mb-3">

                            <label class="form-label">
                                Image
                            </label>

                            <input
                                type="text"
                                name="image"
                                class="form-control"
                                placeholder="Example: chicken-burger.png">

                            <small class="text-muted">
                                You can update the image filename or URL later.
                            </small>

                        </div>


                        <!-- AVAILABILITY -->

                        <div class="mb-4">

                            <label class="form-label">
                                Availability
                            </label>

                            <select
                                name="is_available"
                                class="form-select">

                                <option value="1">
                                    Available
                                </option>

                                <option value="0">
                                    Unavailable
                                </option>

                            </select>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-success w-100">

                            <i class="bi bi-plus-circle"></i>
                            Add Food

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>