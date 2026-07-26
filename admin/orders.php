<?php

session_start();

require_once("../config/db.php");

// Admin only
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../log-in.php");
    exit();
}


// UPDATE ORDER STATUS
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $order_id = (int) $_POST["order_id"];
    $status = $_POST["order_status"];

    $allowed_statuses = [
        "Pending",
        "Preparing",
        "Out for Delivery",
        "Delivered"
    ];

    if (in_array($status, $allowed_statuses)) {

        $update = $conn->prepare(
            "UPDATE orders
             SET order_status = ?
             WHERE id = ?"
        );

        $update->bind_param(
            "si",
            $status,
            $order_id
        );

        $update->execute();
    }

    header("Location: manage-orders.php");
    exit();
}


// GET ALL ORDERS
$sql = "
    SELECT
        orders.*,
        users.full_name
    FROM orders
    JOIN users
        ON orders.user_id = users.id
    ORDER BY orders.created_at DESC
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Orders | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <a href="dashboard.php"
       class="text-decoration-none">

        ← Dashboard

    </a>

    <h2 class="fw-bold mt-3 mb-4">
        Manage Orders
    </h2>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Order</th>

                            <th>Customer</th>

                            <th>Total</th>

                            <th>Payment</th>

                            <th>Status</th>

                            <th>Update</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php while ($order = $result->fetch_assoc()) { ?>

                        <tr>

                            <td>
                                #<?php echo $order["id"]; ?>
                            </td>


                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $order["full_name"]
                                );
                                ?>

                            </td>


                            <td>

                                ₹<?php
                                echo number_format(
                                    $order["total_amount"],
                                    2
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $order["payment_method"]
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $order["order_status"]
                                );
                                ?>

                            </td>


                            <td>

                                <form method="POST"
                                      class="d-flex gap-2">

                                    <input
                                        type="hidden"
                                        name="order_id"
                                        value="<?php echo $order["id"]; ?>">


                                    <select
                                        name="order_status"
                                        class="form-select form-select-sm">


                                        <option
                                            value="Pending"
                                            <?php
                                            if ($order["order_status"] === "Pending")
                                                echo "selected";
                                            ?>>

                                            Pending

                                        </option>


                                        <option
                                            value="Preparing"
                                            <?php
                                            if ($order["order_status"] === "Preparing")
                                                echo "selected";
                                            ?>>

                                            Preparing

                                        </option>


                                        <option
                                            value="Out for Delivery"
                                            <?php
                                            if ($order["order_status"] === "Out for Delivery")
                                                echo "selected";
                                            ?>>

                                            Out for Delivery

                                        </option>


                                        <option
                                            value="Delivered"
                                            <?php
                                            if ($order["order_status"] === "Delivered")
                                                echo "selected";
                                            ?>>

                                            Delivered

                                        </option>

                                    </select>


                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-success">

                                        Update

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>