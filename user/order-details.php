<?php

session_start();

require_once("../config/db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Check order ID
if (!isset($_GET["id"])) {
    header("Location: order-history.php");
    exit();
}

$order_id = (int) $_GET["id"];


// Get order
$stmt = $conn->prepare(
    "SELECT *
     FROM orders
     WHERE id = ? AND user_id = ?"
);

$stmt->bind_param("ii", $order_id, $user_id);

$stmt->execute();

$order_result = $stmt->get_result();


// Order doesn't belong to user or doesn't exist
if ($order_result->num_rows !== 1) {
    header("Location: order-history.php");
    exit();
}

$order = $order_result->fetch_assoc();


// Get items belonging to this order
$item_stmt = $conn->prepare(
    "SELECT
        order_items.quantity,
        order_items.price,
        menu_items.name,
        menu_items.category
     FROM order_items
     JOIN menu_items
        ON order_items.food_id = menu_items.id
     WHERE order_items.order_id = ?"
);

$item_stmt->bind_param("i", $order_id);

$item_stmt->execute();

$items = $item_stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Order Details | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <!-- TOP -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <a href="order-history.php"
               class="text-decoration-none">

                <i class="bi bi-arrow-left"></i>
                Order History

            </a>

            <h2 class="fw-bold mt-3">
                Order #<?php echo $order["id"]; ?>
            </h2>

            <p class="text-muted">

                <?php
                echo date(
                    "d M Y, h:i A",
                    strtotime($order["created_at"])
                );
                ?>

            </p>

        </div>


        <span class="badge bg-warning text-dark fs-6">

            <?php
            echo htmlspecialchars(
                $order["order_status"]
            );
            ?>

        </span>

    </div>


    <div class="row g-4">


        <!-- ORDER ITEMS -->

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Items
                    </h4>


                    <?php while ($item = $items->fetch_assoc()) { ?>

                        <?php

                        $subtotal =
                            $item["price"] *
                            $item["quantity"];

                        ?>

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h5 class="mb-1">

                                    <?php
                                    echo htmlspecialchars(
                                        $item["name"]
                                    );
                                    ?>

                                </h5>

                                <small class="text-muted">

                                    <?php
                                    echo htmlspecialchars(
                                        $item["category"]
                                    );
                                    ?>

                                </small>

                                <p class="mb-0 mt-1">

                                    ₹<?php
                                    echo number_format(
                                        $item["price"],
                                        2
                                    );
                                    ?>

                                    ×

                                    <?php
                                    echo $item["quantity"];
                                    ?>

                                </p>

                            </div>


                            <strong>

                                ₹<?php
                                echo number_format(
                                    $subtotal,
                                    2
                                );
                                ?>

                            </strong>

                        </div>

                        <hr>

                    <?php } ?>


                    <!-- TOTAL -->

                    <div class="d-flex justify-content-between">

                        <h5>
                            Total
                        </h5>

                        <h5 class="fw-bold">

                            ₹<?php
                            echo number_format(
                                $order["total_amount"],
                                2
                            );
                            ?>

                        </h5>

                    </div>

                </div>

            </div>

        </div>


        <!-- DELIVERY INFORMATION -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Delivery Details
                    </h4>


                    <div class="mb-3">

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


                    <div class="mb-3">

                        <small class="text-muted">
                            Address
                        </small>

                        <p>

                            <?php
                            echo htmlspecialchars(
                                $order["delivery_address"]
                            );
                            ?>

                        </p>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted">
                            Payment Method
                        </small>

                        <p class="fw-semibold">

                            <?php
                            echo htmlspecialchars(
                                $order["payment_method"]
                            );
                            ?>

                        </p>

                    </div>


                    <div>

                        <small class="text-muted">
                            Order Status
                        </small>

                        <p class="fw-semibold">

                            <?php
                            echo htmlspecialchars(
                                $order["order_status"]
                            );
                            ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>