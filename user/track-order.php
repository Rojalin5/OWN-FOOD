<?php

session_start();
require_once("../config/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if (!isset($_GET["id"])) {
    header("Location: order-history.php");
    exit();
}

$order_id = (int) $_GET["id"];

// Get this user's order
$stmt = $conn->prepare(
    "SELECT *
     FROM orders
     WHERE id = ? AND user_id = ?"
);

$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    header("Location: order-history.php");
    exit();
}

$order = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Track Order | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <a href="order-history.php"
       class="text-decoration-none">
        ← Order History
    </a>

    <div class="card border-0 shadow-sm mt-4">

        <div class="card-body p-5">

            <h2 class="fw-bold">
                Track Order #<?php echo $order["id"]; ?>
            </h2>

            <p class="text-muted">
                Current Status:
                <strong>
                    <?php echo htmlspecialchars($order["order_status"]); ?>
                </strong>
            </p>

            <hr class="my-4">


            <!-- PENDING -->

            <div class="mb-4">

                <h5>
                    <?php
                    if (in_array($order["order_status"], [
                        "Pending",
                        "Preparing",
                        "Out for Delivery",
                        "Delivered"
                    ])) {
                        echo "✅";
                    } else {
                        echo "○";
                    }
                    ?>

                    Order Confirmed
                </h5>

                <p class="text-muted ms-4">
                    We have received your order.
                </p>

            </div>


            <!-- PREPARING -->

            <div class="mb-4">

                <h5>

                    <?php
                    if (in_array($order["order_status"], [
                        "Preparing",
                        "Out for Delivery",
                        "Delivered"
                    ])) {
                        echo "✅";
                    } else {
                        echo "○";
                    }
                    ?>

                    Preparing Food

                </h5>

                <p class="text-muted ms-4">
                    Your food is being prepared.
                </p>

            </div>


            <!-- OUT FOR DELIVERY -->

            <div class="mb-4">

                <h5>

                    <?php
                    if (in_array($order["order_status"], [
                        "Out for Delivery",
                        "Delivered"
                    ])) {
                        echo "✅";
                    } else {
                        echo "○";
                    }
                    ?>

                    Out for Delivery

                </h5>

                <p class="text-muted ms-4">
                    Your order is on the way.
                </p>

            </div>


            <!-- DELIVERED -->

            <div>

                <h5>

                    <?php
                    if ($order["order_status"] === "Delivered") {
                        echo "✅";
                    } else {
                        echo "○";
                    }
                    ?>

                    Delivered

                </h5>

                <p class="text-muted ms-4">
                    Order delivered successfully.
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>