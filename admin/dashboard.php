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


// Total users
$user_result = $conn->query(
    "SELECT COUNT(*) AS total FROM users WHERE role = 'user'"
);

$total_users = $user_result->fetch_assoc()["total"];


// Total menu items
$food_result = $conn->query(
    "SELECT COUNT(*) AS total FROM menu_items"
);

$total_foods = $food_result->fetch_assoc()["total"];


// Total orders
$order_result = $conn->query(
    "SELECT COUNT(*) AS total FROM orders"
);

$total_orders = $order_result->fetch_assoc()["total"];


// Pending orders
$pending_result = $conn->query(
    "SELECT COUNT(*) AS total
     FROM orders
     WHERE order_status = 'Pending'"
);

$pending_orders = $pending_result->fetch_assoc()["total"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold">
                Admin Dashboard
            </h2>

            <p class="text-muted mb-0">

                Welcome,
                <?php
                echo htmlspecialchars(
                    $_SESSION["full_name"]
                );
                ?>

            </p>

        </div>

        <a
            href="../auth/logout.php"
            class="btn btn-outline-danger">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </a>

    </div>


    <!-- STATISTICS -->

    <div class="row g-4 mb-5">


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <i class="bi bi-people fs-2 text-primary"></i>

                    <p class="text-muted mt-3 mb-1">
                        Total Users
                    </p>

                    <h2 class="fw-bold">
                        <?php echo $total_users; ?>
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <i class="bi bi-burger fs-2 text-success"></i>

                    <p class="text-muted mt-3 mb-1">
                        Menu Items
                    </p>

                    <h2 class="fw-bold">
                        <?php echo $total_foods; ?>
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <i class="bi bi-bag-check fs-2 text-warning"></i>

                    <p class="text-muted mt-3 mb-1">
                        Total Orders
                    </p>

                    <h2 class="fw-bold">
                        <?php echo $total_orders; ?>
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <i class="bi bi-clock fs-2 text-danger"></i>

                    <p class="text-muted mt-3 mb-1">
                        Pending Orders
                    </p>

                    <h2 class="fw-bold">
                        <?php echo $pending_orders; ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>


    <!-- ADMIN ACTIONS -->

    <h4 class="fw-bold mb-3">
        Management
    </h4>

    <div class="row g-4">


        <div class="col-md-4">

            <a
                href="manage-menu.php"
                class="text-decoration-none">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <i class="bi bi-card-list fs-2"></i>

                        <h5 class="mt-3 text-dark">
                            Manage Menu
                        </h5>

                        <p class="text-muted mb-0">
                            Add, edit or remove food items.
                        </p>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-md-4">

            <a
                href="manage-orders.php"
                class="text-decoration-none">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <i class="bi bi-bag fs-2"></i>

                        <h5 class="mt-3 text-dark">
                            Manage Orders
                        </h5>

                        <p class="text-muted mb-0">
                            View orders and update their status.
                        </p>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-md-4">

            <a
                href="manage-users.php"
                class="text-decoration-none">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <i class="bi bi-people fs-2"></i>

                        <h5 class="mt-3 text-dark">
                            Manage Users
                        </h5>

                        <p class="text-muted mb-0">
                            View registered customers.
                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

</body>

</html>