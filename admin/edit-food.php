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


// Get existing food
$stmt = $conn->prepare(
    "SELECT * FROM menu_items WHERE id = ?"
);

$stmt->bind_param("i", $food_id);

$stmt->execute();

$result = $stmt->get_result();


// Food not found
if ($result->num_rows !== 1) {
    header("Location: foods.php");
    exit();
}

$food = $result->fetch_assoc();

$error = "";


// ========================================
// UPDATE FOOD
// ========================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $category = trim($_POST["category"]);
    $price = $_POST["price"];
    $is_available = $_POST["is_available"];


    if (
        empty($name) ||
        empty($category) ||
        empty($price)
    ) {

        $error = "Please fill all required fields.";

    } else {

        $update_stmt = $conn->prepare(
            "UPDATE menu_items
             SET
                name = ?,
                description = ?,
                category = ?,
                price = ?,
                is_available = ?
             WHERE id = ?"
        );

        $update_stmt->bind_param(
            "sssdii",
            $name,
            $description,
            $category,
            $price,
            $is_available,
            $food_id
        );


        if ($update_stmt->execute()) {

            header("Location: foods.php");
            exit();

        } else {

            $error = "Unable to update food item.";
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

    <title>Edit Food | OwnFood Admin</title>

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


            <div class="mb-4">

                <a
                    href="foods.php"
                    class="text-decoration-none text-dark"
                >

                    <i class="bi bi-arrow-left"></i>
                    Back to Food

                </a>

                <h2 class="fw-bold mt-3 mb-1">
                    Edit Food
                </h2>

                <p class="text-muted">
                    Update this menu item.
                </p>

            </div>


            <?php if (!empty($error)) { ?>

                <div class="alert alert-danger">

                    <?php echo htmlspecialchars($error); ?>

                </div>

            <?php } ?>


            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <form method="POST">


                        <!-- NAME -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Food Name *
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="<?php echo htmlspecialchars($food["name"]); ?>"
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
                            ><?php echo htmlspecialchars($food["description"]); ?></textarea>

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

                                <option
                                    value="Burger"
                                    <?php echo $food["category"] === "Burger" ? "selected" : ""; ?>
                                >
                                    Burger
                                </option>

                                <option
                                    value="Pizza"
                                    <?php echo $food["category"] === "Pizza" ? "selected" : ""; ?>
                                >
                                    Pizza
                                </option>

                                <option
                                    value="Biryani"
                                    <?php echo $food["category"] === "Biryani" ? "selected" : ""; ?>
                                >
                                    Biryani
                                </option>

                                <option
                                    value="Main Course"
                                    <?php echo $food["category"] === "Main Course" ? "selected" : ""; ?>
                                >
                                    Main Course
                                </option>

                                <option
                                    value="Chinese"
                                    <?php echo $food["category"] === "Chinese" ? "selected" : ""; ?>
                                >
                                    Chinese
                                </option>

                                <option
                                    value="Snacks"
                                    <?php echo $food["category"] === "Snacks" ? "selected" : ""; ?>
                                >
                                    Snacks
                                </option>

                                <option
                                    value="Dessert"
                                    <?php echo $food["category"] === "Dessert" ? "selected" : ""; ?>
                                >
                                    Dessert
                                </option>

                                <option
                                    value="Drinks"
                                    <?php echo $food["category"] === "Drinks" ? "selected" : ""; ?>
                                >
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
                                            value="<?php echo htmlspecialchars($food["price"]); ?>"
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

                                        <option
                                            value="1"
                                            <?php echo $food["is_available"] == 1 ? "selected" : ""; ?>
                                        >
                                            Available
                                        </option>

                                        <option
                                            value="0"
                                            <?php echo $food["is_available"] == 0 ? "selected" : ""; ?>
                                        >
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
                                class="btn btn-primary"
                            >

                                <i class="bi bi-check-lg"></i>

                                Update Food

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