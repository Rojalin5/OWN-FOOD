<?php

session_start();

require_once("../config/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Get all orders of logged-in user
$stmt = $conn->prepare(
    "SELECT *
     FROM orders
     WHERE user_id = ?
     ORDER BY created_at DESC"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order History | OwnFood</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    Order History
                </h2>

                <p class="text-muted mb-0">
                    View all your previous orders.
                </p>

            </div>

            <a href="dashboard.php" class="btn btn-outline-dark">

                <i class="bi bi-arrow-left"></i>
                Dashboard

            </a>

        </div>


        <?php if ($result->num_rows > 0) { ?>


            <?php while ($order = $result->fetch_assoc()) { ?>


                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">


                        <!-- ORDER HEADER -->

                        <div class="d-flex justify-content-between align-items-start">

                            <div>

                                <h5 class="fw-bold">
                                    Order #<?php echo $order["id"]; ?>
                                </h5>

                                <small class="text-muted">

                                    <?php
                                    echo date(
                                        "d M Y, h:i A",
                                        strtotime($order["created_at"])
                                    );
                                    ?>

                                </small>

                            </div>


                            <span class="badge bg-warning text-dark">

                                <?php
                                echo htmlspecialchars(
                                    $order["order_status"]
                                );
                                ?>

                            </span>

                        </div>


                        <hr>


                        <!-- ORDER INFORMATION -->

                        <div class="row">

                            <div class="col-md-4">

                                <small class="text-muted">
                                    Total Amount
                                </small>

                                <h5>
                                    ₹<?php
                                    echo number_format(
                                        $order["total_amount"],
                                        2
                                    );
                                    ?>
                                </h5>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted">
                                    Payment
                                </small>

                                <p class="fw-semibold">

                                    <?php
                                    echo htmlspecialchars(
                                        $order["payment_method"]
                                    );
                                    ?>

                                </p>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted">
                                    Phone
                                </small>

                                <p class="fw-semibold">

                                    <?php
                                    echo htmlspecialchars(
                                        $order["phone"]
                                    );
                                    ?>

                                </p>

                            </div>

                        </div>


                        <div class="mt-2">

                            <small class="text-muted">
                                Delivery Address
                            </small>

                            <p class="mb-0">

                                <?php
                                echo htmlspecialchars(
                                    $order["delivery_address"]
                                );
                                ?>

                            </p>

                        </div>


                        <div class="mt-3">

                            <a href="order-details.php?id=<?php echo $order["id"]; ?>" class="btn btn-sm btn-outline-success">

                                View Order Details

                            </a>
                            <a href="track-order.php?id=<?php echo $order["id"]; ?>" class="btn btn-sm btn-success">

                                <i class="bi bi-truck"></i>
                                Track Order

                            </a>

                            <a href="invoice.php?id=<?php echo $order["id"]; ?>"
                                class="btn btn-sm btn-outline-dark">

                                <i class="bi bi-receipt"></i>
                                Invoice

                            </a>

                        </div>


                    </div>

                </div>


            <?php } ?>


        <?php } else { ?>


            <!-- NO ORDERS -->

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <i class="bi bi-bag-x" style="font-size: 60px;">
                    </i>

                    <h4 class="mt-3">
                        No orders yet
                    </h4>

                    <p class="text-muted">
                        Your previous orders will appear here.
                    </p>

                    <a href="order_user.php" class="btn btn-success">

                        Order Food

                    </a>

                </div>

            </div>


        <?php } ?>


    </div>

</body>

</html>