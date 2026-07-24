<?php

session_start();

require_once("../config/db.php");

// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Get cart items with food details
$stmt = $conn->prepare(
    "SELECT
        cart.id AS cart_id,
        cart.quantity,
        menu_items.id AS food_id,
        menu_items.name,
        menu_items.price
     FROM cart
     JOIN menu_items
        ON cart.food_id = menu_items.id
     WHERE cart.user_id = ?
     ORDER BY cart.id DESC"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Cart | OwnFood</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>My Cart</h2>

            <a href="order_user.php" class="btn btn-outline-dark">

                <i class="bi bi-arrow-left"></i>
                Continue Ordering

            </a>

        </div>


        <?php if ($result->num_rows > 0) { ?>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>Food</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($item = $result->fetch_assoc()) { ?>

                            <?php

                            $subtotal =
                                $item["price"] * $item["quantity"];

                            $grand_total += $subtotal;

                            ?>

                            <tr>

                                <!-- Food Name -->

                                <td>
                                    <strong>
                                        <?php
                                        echo htmlspecialchars($item["name"]);
                                        ?>
                                    </strong>
                                </td>


                                <!-- Price -->

                                <td>

                                    ₹<?php
                                    echo number_format(
                                        $item["price"],
                                        2
                                    );
                                    ?>

                                </td>


                                <!-- Quantity -->

                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <!-- DECREASE -->

                                        <form action="update-cart.php" method="POST">

                                            <input type="hidden" name="cart_id" value="<?php echo $item["cart_id"]; ?>">

                                            <input type="hidden" name="action" value="decrease">

                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                −
                                            </button>

                                        </form>


                                        <strong>
                                            <?php echo $item["quantity"]; ?>
                                        </strong>


                                        <!-- INCREASE -->

                                        <form action="update-cart.php" method="POST">

                                            <input type="hidden" name="cart_id" value="<?php echo $item["cart_id"]; ?>">

                                            <input type="hidden" name="action" value="increase">

                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                +
                                            </button>

                                        </form>

                                    </div>

                                </td>


                                <!-- Subtotal -->

                                <td>

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

            </div>


            <!-- CART TOTAL -->

            <div class="text-end mt-4">

                <h4>
                    Total:
                    ₹<?php echo number_format($grand_total, 2); ?>
                </h4>

                <a href="checkout.php" class="btn btn-success mt-3">
                    Proceed to Checkout
                </a>

            </div>

        <?php } else { ?>


            <!-- EMPTY CART -->

            <div class="text-center py-5">

                <i class="bi bi-cart-x fs-1"></i>

                <h3 class="mt-3">
                    Your cart is empty
                </h3>

                <p>
                    Add some delicious food to your cart.
                </p>

                <a href="order_user.php" class="btn btn-primary">

                    Order Food

                </a>

            </div>


        <?php } ?>

    </div>

</body>

</html>