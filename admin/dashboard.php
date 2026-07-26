<?php

session_start();

require_once("../config/db.php");


// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}


// Only admin can access
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}


// Total Users
$userResult = $conn->query(
    "SELECT COUNT(*) AS total FROM users WHERE role = 'user'"
);

$totalUsers = $userResult->fetch_assoc()["total"];


// Total Food Items
$foodResult = $conn->query(
    "SELECT COUNT(*) AS total FROM menu_items"
);

$totalFoods = $foodResult->fetch_assoc()["total"];


// Total Orders
$orderResult = $conn->query(
    "SELECT COUNT(*) AS total FROM orders"
);

$totalOrders = $orderResult->fetch_assoc()["total"];


// Pending Orders
$pendingResult = $conn->query(
    "SELECT COUNT(*) AS total
     FROM orders
     WHERE order_status = 'Pending'"
);

$totalPending = $pendingResult->fetch_assoc()["total"];

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


<!-- NAVBAR -->

<nav class="navbar bg-white border-bottom">

    <div class="container py-2">

        <a
            href="dashboard.php"
            class="navbar-brand fw-bold">

            🍔 OwnFood Admin

        </a>


        <div>

            <a
                href="../auth/logout.php"
                class="btn btn-outline-danger btn-sm">

                Logout

            </a>

        </div>

    </div>

</nav>


<!-- DASHBOARD -->

<div class="container py-5">


<div class="mb-5">

    <p class="text-muted mb-1">
        Hello, Admin 👋
    </p>

    <h2 class="fw-bold">
        Admin Dashboard
    </h2>

    <p class="text-muted">
        Manage your OwnFood platform.
    </p>

</div>

    <!-- STAT CARDS -->

    <div class="row g-4">


        <!-- USERS -->

        <div class="col-md-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <i class="bi bi-people fs-2 text-primary"></i>

                    <p class="text-muted mt-3 mb-1">
                        Total Users
                    </p>

                    <h2 class="fw-bold">

                        <?php echo $totalUsers; ?>

                    </h2>

                </div>

            </div>

        </div>


        <!-- FOOD -->

        <div class="col-md-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <i class="bi bi-cup-hot fs-2 text-warning"></i>

                    <p class="text-muted mt-3 mb-1">
                        Menu Items
                    </p>

                    <h2 class="fw-bold">

                        <?php echo $totalFoods; ?>

                    </h2>

                </div>

            </div>

        </div>


        <!-- ORDERS -->

        <div class="col-md-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <i class="bi bi-bag-check fs-2 text-success"></i>

                    <p class="text-muted mt-3 mb-1">
                        Total Orders
                    </p>

                    <h2 class="fw-bold">

                        <?php echo $totalOrders; ?>

                    </h2>

                </div>

            </div>

        </div>


        <!-- PENDING -->

        <div class="col-md-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <i class="bi bi-clock fs-2 text-danger"></i>

                    <p class="text-muted mt-3 mb-1">
                        Pending Orders
                    </p>

                    <h2 class="fw-bold">

                        <?php echo $totalPending; ?>

                    </h2>

                </div>

            </div>

        </div>


    </div>


    <!-- MANAGEMENT -->

    <div class="row g-4 mt-4">


        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold">
                        Manage Menu
                    </h4>

                    <p class="text-muted">
                        Add, edit or remove food items.
                    </p>

                    <a
                        href="foods.php"
                        class="btn btn-dark">

                        Manage Food

                    </a>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold">
                        Manage Orders
                    </h4>

                    <p class="text-muted">
                        View orders and update their status.
                    </p>

                    <a
                        href="orders.php"
                        class="btn btn-dark">

                        Manage Orders

                    </a>

                </div>

            </div>

        </div>


    </div>

</div>


</body>
</html>