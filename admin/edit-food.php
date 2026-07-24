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

// Food ID must exist
if (!isset($_GET["id"])) {
    header("Location: manage-menu.php");
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

if ($result->num_rows !== 1) {
    header("Location: manage-menu.php");
    exit();
}

$food = $result->fetch_assoc();


// UPDATE FOOD
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $price = (float) $_POST["price"];
    $category = trim($_POST["category"]);
    $image = trim($_POST["image"]);
    $is_available = (int) $_POST["is_available"];


    $update = $conn->prepare(
        "UPDATE menu_items
         SET
            name = ?,
            description = ?,
            price = ?,
            category = ?,
            image = ?,
            is_available = ?
         WHERE id = ?"
    );


    $update->bind_param(
        "ssdssii",
        $name,
        $description,
        $price,
        $category,
        $image,
        $is_available,
        $food_id
    );


    if ($update->execute()) {

        header("Location: manage-menu.php");
        exit();

    } else {

        $error = "Unable to update food.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Food | OwnFood</title>

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

                    <h2 class="fw-bold">
                        Edit Food
                    </h2>

                    <p class="text-muted mb-4">
                        Update menu item information.
                    </p>


                    <?php if (isset($error)) { ?>

                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>

                    <?php } ?>


                    <form method="POST">


                        <!-- FOOD NAME -->

                        <div class="mb-3">

                            <label class="form-label">
                                Food Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="<?php echo htmlspecialchars($food["name"]); ?>"
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
                                required><?php echo htmlspecialchars($food["description"]); ?></textarea>

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
                                step="0.01"
                                min="1"
                                value="<?php echo $food["price"]; ?>"
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

                                <?php

                                $categories = [
                                    "Burger",
                                    "Pizza",
                                    "Biryani",
                                    "Indian",
                                    "Chinese",
                                    "Snacks",
                                    "Dessert",
                                    "Drinks"
                                ];

                                foreach ($categories as $category) {

                                ?>

                                    <option
                                        value="<?php echo $category; ?>"

                                        <?php
                                        if ($food["category"] === $category) {
                                            echo "selected";
                                        }
                                        ?>>

                                        <?php echo $category; ?>

                                    </option>

                                <?php } ?>

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
                                value="<?php echo htmlspecialchars($food["image"] ?? ""); ?>">

                        </div>


                        <!-- AVAILABILITY -->

                        <div class="mb-4">

                            <label class="form-label">
                                Availability
                            </label>

                            <select
                                name="is_available"
                                class="form-select">

                                <option
                                    value="1"
                                    <?php
                                    if ($food["is_available"] == 1) {
                                        echo "selected";
                                    }
                                    ?>>

                                    Available

                                </option>


                                <option
                                    value="0"
                                    <?php
                                    if ($food["is_available"] == 0) {
                                        echo "selected";
                                    }
                                    ?>>

                                    Unavailable

                                </option>

                            </select>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-check-circle"></i>

                            Update Food

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>