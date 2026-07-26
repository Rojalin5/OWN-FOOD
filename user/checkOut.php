<?php

session_start();

require_once("../config/db.php");

// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Get cart items
$stmt = $conn->prepare(
    "SELECT
        cart.quantity,
        menu_items.name,
        menu_items.price
     FROM cart
     JOIN menu_items
        ON cart.food_id = menu_items.id
     WHERE cart.user_id = ?"
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

    <title>Checkout | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="mb-4">

        <a href="cart_user.php"
           class="text-decoration-none">

            <i class="bi bi-arrow-left"></i>
            Back to Cart

        </a>

        <h2 class="mt-3">
            Checkout
        </h2>

    </div>


    <?php if ($result->num_rows > 0) { ?>

        <div class="row g-4">


            <!-- DELIVERY DETAILS -->

            <div class="col-lg-7">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h4 class="mb-4">
                            Delivery Details
                        </h4>

                        <form
                            action="place-order.php"
                            method="POST">


                            <!-- NAME -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo htmlspecialchars($_SESSION["full_name"]); ?>"
                                    readonly>

                            </div>


                            <!-- PHONE -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter phone number"
                                    required>

                            </div>


                            <!-- ADDRESS -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Delivery Address
                                </label>

                                <textarea
                                    name="delivery_address"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter complete delivery address"
                                    required></textarea>

                            </div>



                            <div class="mb-4">

                                <label class="form-label">
                                    Payment Method
                                </label>

                                <select
                                    name="payment_method"
                                    class="form-select"
                                    required>

                                    <option value="COD">
                                        Cash on Delivery
                                    </option>

                                    <option value="Online">
                                        Online Payment
                                    </option>

                                </select>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-success w-100">

                                Place Order

                            </button>

                        </form>

                    </div>

                </div>

            </div>


            <!-- ORDER SUMMARY -->

            <div class="col-lg-5">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h4 class="mb-4">
                            Order Summary
                        </h4>


                        <?php while ($item = $result->fetch_assoc()) { ?>

                            <?php

                            $subtotal =
                                $item["price"] *
                                $item["quantity"];

                            $grand_total += $subtotal;

                            ?>

                            <div class="d-flex justify-content-between mb-3">

                                <div>

                                    <strong>
                                        <?php
                                        echo htmlspecialchars($item["name"]);
                                        ?>
                                    </strong>

                                    <small class="d-block text-muted">

                                        Qty:
                                        <?php echo $item["quantity"]; ?>

                                    </small>

                                </div>

                                <span>

                                    ₹<?php
                                    echo number_format(
                                        $subtotal,
                                        2
                                    );
                                    ?>

                                </span>

                            </div>

                        <?php } ?>


                        <hr>


                        <div class="d-flex justify-content-between">

                            <strong>
                                Total
                            </strong>

                            <strong>

                                ₹<?php
                                echo number_format(
                                    $grand_total,
                                    2
                                );
                                ?>

                            </strong>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    <?php } else { ?>


        <div class="text-center py-5">

            <i class="bi bi-cart-x fs-1"></i>

            <h3 class="mt-3">
                Your cart is empty
            </h3>

            <a
                href="order_user.php"
                class="btn btn-primary mt-3">

                Order Food

            </a>

        </div>


    <?php } ?>

</div>

</body>
</html>