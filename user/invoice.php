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

// Get order
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


// Get order items
$item_stmt = $conn->prepare(
    "SELECT
        order_items.quantity,
        order_items.price,
        menu_items.name
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

    <title>Invoice | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        .invoice-box {
            max-width: 900px;
            margin: auto;
        }

        @media print {

            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .invoice-box {
                box-shadow: none !important;
            }
        }

    </style>

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="invoice-box card border-0 shadow-sm">

        <div class="card-body p-5">


            <!-- HEADER -->

            <div class="d-flex justify-content-between mb-5">

                <div>

                    <h2 class="fw-bold">
                        🍔 OwnFood
                    </h2>

                    <p class="text-muted mb-0">
                        Food Delivery Service
                    </p>

                </div>


                <div class="text-end">

                    <h3>
                        INVOICE
                    </h3>

                    <p class="mb-0">

                        Invoice #
                        <?php echo $order["id"]; ?>

                    </p>

                    <small class="text-muted">

                        <?php
                        echo date(
                            "d M Y",
                            strtotime($order["created_at"])
                        );
                        ?>

                    </small>

                </div>

            </div>


            <!-- CUSTOMER -->

            <div class="row mb-5">

                <div class="col-md-6">

                    <h6 class="text-muted">
                        BILL TO
                    </h6>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $_SESSION["full_name"]
                        );
                        ?>

                    </strong>

                    <p class="mb-1 mt-2">

                        <?php
                        echo htmlspecialchars(
                            $order["delivery_address"]
                        );
                        ?>

                    </p>

                    <p>

                        Phone:
                        <?php
                        echo htmlspecialchars(
                            $order["phone"]
                        );
                        ?>

                    </p>

                </div>


                <div class="col-md-6 text-md-end">

                    <h6 class="text-muted">
                        PAYMENT
                    </h6>

                    <p class="mb-1">

                        Method:
                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $order["payment_method"]
                            );
                            ?>
                        </strong>

                    </p>

                    <p>

                        Status:
                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $order["payment_status"]
                            );
                            ?>
                        </strong>

                    </p>

                </div>

            </div>


            <!-- ITEMS -->

            <table class="table">

                <thead>

                    <tr>

                        <th>Item</th>

                        <th class="text-center">
                            Qty
                        </th>

                        <th class="text-end">
                            Price
                        </th>

                        <th class="text-end">
                            Subtotal
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php while ($item = $items->fetch_assoc()) { ?>

                    <?php

                    $subtotal =
                        $item["price"] *
                        $item["quantity"];

                    ?>

                    <tr>

                        <td>

                            <?php
                            echo htmlspecialchars(
                                $item["name"]
                            );
                            ?>

                        </td>


                        <td class="text-center">

                            <?php
                            echo $item["quantity"];
                            ?>

                        </td>


                        <td class="text-end">

                            ₹<?php
                            echo number_format(
                                $item["price"],
                                2
                            );
                            ?>

                        </td>


                        <td class="text-end">

                            ₹<?php
                            echo number_format(
                                $subtotal,
                                2
                            );
                            ?>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>


            <!-- TOTAL -->

            <div class="text-end mt-4">

                <h4>

                    Total:
                    ₹<?php
                    echo number_format(
                        $order["total_amount"],
                        2
                    );
                    ?>

                </h4>

            </div>


            <hr class="my-4">


            <div class="text-center">

                <p class="text-muted">
                    Thank you for ordering with OwnFood!
                </p>

            </div>

        </div>

    </div>


    <!-- BUTTONS -->

    <div class="text-center mt-4 no-print">

        <button
            onclick="window.print()"
            class="btn btn-success">

            Print Invoice

        </button>

        <a
            href="order-history.php"
            class="btn btn-outline-dark">

            Back to Orders

        </a>

    </div>

</div>

</body>

</html>