<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if (!isset($_GET["order_id"])) {
    header("Location: dashboard.php");
    exit();
}

$order_id = (int) $_GET["order_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Successful | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container">

    <div
        class="d-flex justify-content-center align-items-center"
        style="min-height: 100vh;">

        <div
            class="card border-0 shadow-sm text-center p-5"
            style="max-width: 550px; width: 100%;">

            <div class="mb-3">

                <i
                    class="bi bi-check-circle-fill text-success"
                    style="font-size: 70px;">
                </i>

            </div>

            <h2 class="fw-bold">
                Order Placed Successfully!
            </h2>

            <p class="text-muted mt-3">

                Thank you,
                <?php echo htmlspecialchars($_SESSION["full_name"]); ?>!

                Your order has been received.

            </p>

            <div class="bg-light rounded p-3 mt-3">

                <small class="text-muted">
                    Order ID
                </small>

                <h4 class="mb-0">
                    #<?php echo $order_id; ?>
                </h4>

            </div>

            <p class="text-muted mt-4">
                Your food is being prepared and will be delivered soon.
            </p>

            <div class="d-grid gap-2 mt-3">

                <a
                    href="order-history.php"
                    class="btn btn-success">

                    <i class="bi bi-clock-history"></i>
                    View Order History

                </a>

                <a
                    href="order_user.php"
                    class="btn btn-outline-dark">

                    Order More Food

                </a>

                <a
                    href="dashboard.php"
                    class="btn btn-outline-secondary">

                    Back to Dashboard

                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>