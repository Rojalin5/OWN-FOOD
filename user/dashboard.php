<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Dashboard | OwnFood</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/common.css">

    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>

    <div class="dashboard-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">

            <div class="brand">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../assets/img/logo.png" alt="Own Food Logo" class="logo">
                    <span class="brand-name ms-2">Own Food</span>
                </a>
            </div>

            <ul class="sidebar-menu">

                <li>
                    <a href="dashboard.php" class="active">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="order_user.php">
                        <i class="bi bi-bag"></i>
                        Order Food
                    </a>
                </li>

                <li>
                    <a href="cart_user.php">
                        <i class="bi bi-cart"></i>
                        My Cart
                    </a>
                </li>

                <li>
                    <a href="order-history.php">
                        <i class="bi bi-clock-history"></i>
                        Order History
                    </a>
                </li>

                <li>
                    <a href="profile.php">
                        <i class="bi bi-person"></i>
                        Profile
                    </a>
                </li>

            </ul>

            <div class="logout-section">

                <a href="../auth/logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>

            </div>

        </aside>


        <!-- Main Content -->
        <main class="main-content">

            <!-- Top Bar -->
            <div class="topbar">

                <div>
                    <h2>
                        Welcome, <?php echo htmlspecialchars($_SESSION["full_name"]); ?> 👋
                    </h2>

                    <p>What would you like to eat today?</p>
                </div>

                <div class="user-info">

                    <div class="user-avatar">
                        <?php
                        echo strtoupper(
                            substr($_SESSION["full_name"], 0, 1)
                        );
                        ?>
                    </div>

                    <div>
                        <strong>
                            <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
                        </strong>

                        <span>
                            <?php echo htmlspecialchars($_SESSION["email"]); ?>
                        </span>
                    </div>

                </div>

            </div>


            <!-- Dashboard Cards -->
            <div class="dashboard-cards">

                <div class="dashboard-card">

                    <div class="card-icon">
                        <i class="bi bi-bag-check"></i>
                    </div>

                    <div>
                        <p>Total Orders</p>
                        <h3>0</h3>
                    </div>

                </div>


                <div class="dashboard-card">

                    <div class="card-icon">
                        <i class="bi bi-truck"></i>
                    </div>

                    <div>
                        <p>Active Orders</p>
                        <h3>0</h3>
                    </div>

                </div>


                <div class="dashboard-card">

                    <div class="card-icon">
                        <i class="bi bi-ticket-perforated"></i>
                    </div>

                    <div>
                        <p>Available Coupons</p>
                        <h3>0</h3>
                    </div>

                </div>

            </div>


            <!-- Quick Actions -->
            <section class="quick-section">

                <div class="section-heading">

                    <div>
                        <h3>Quick Actions</h3>
                        <p>Everything you need in one place.</p>
                    </div>

                </div>


                <div class="quick-actions">

                    <a href="../order.php" class="action-card">

                        <i class="bi bi-bag-plus"></i>

                        <h4>Order Food</h4>

                        <p>
                            Browse the menu and order your favourite meals.
                        </p>

                    </a>


                    <a href="cart.php" class="action-card">

                        <i class="bi bi-cart3"></i>

                        <h4>View Cart</h4>

                        <p>
                            Review the food items currently in your cart.
                        </p>

                    </a>


                    <a href="#" class="action-card">

                        <i class="bi bi-clock-history"></i>

                        <h4>Order History</h4>

                        <p>
                            View your previous food orders.
                        </p>

                    </a>

                </div>

            </section>


            <!-- Recent Orders -->
            <section class="recent-orders">

                <div class="section-heading">

                    <div>
                        <h3>Recent Orders</h3>
                        <p>Your latest food orders will appear here.</p>
                    </div>

                </div>

                <div class="empty-orders">

                    <i class="bi bi-bag-x"></i>

                    <h4>No orders yet</h4>

                    <p>
                        You haven't placed any orders yet.
                    </p>

                    <a href="../order.php">
                        Order Food
                    </a>

                </div>

            </section>

        </main>

    </div>

</body>

</html>