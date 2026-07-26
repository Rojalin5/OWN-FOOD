<?php

session_start();

require_once("../config/db.php");
require_once("../config/razorpay.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if (
    !isset($_SESSION["checkout_phone"]) ||
    !isset($_SESSION["checkout_address"])
) {
    header("Location: checkout.php");
    exit();
}

$user_id = $_SESSION["user_id"];


// GET CART ITEMS FROM DATABASE
$stmt = $conn->prepare(
    "SELECT 
        cart.quantity,
        menu_items.price
     FROM cart
     JOIN menu_items
        ON cart.food_id = menu_items.id
     WHERE cart.user_id = ?"
);

$stmt->bind_param("i", $user_id);

$stmt->execute();

$result = $stmt->get_result();


// Cart empty
if ($result->num_rows === 0) {

    header("Location: cart_user.php");
    exit();
}


// CALCULATE TOTAL
$total_amount = 0;

while ($item = $result->fetch_assoc()) {

    $total_amount +=
        $item["price"] * $item["quantity"];
}


// Razorpay uses paise
$amount_in_paise =
    (int) round($total_amount * 100);


// CREATE RAZORPAY ORDER
try {

    $razorpayOrder =
        $api->order->create([

            "receipt" =>
                "ownfood_" . time(),

            "amount" =>
                $amount_in_paise,

            "currency" =>
                "INR"

        ]);

} catch (Exception $e) {

    die(
        "Unable to create Razorpay order: "
        . $e->getMessage()
    );
}


$razorpay_order_id =
    $razorpayOrder["id"];


// Save server-created order ID
$_SESSION["razorpay_order_id"] =
    $razorpay_order_id;

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Payment | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">


            <div class="card border-0 shadow-sm">

                <div class="card-body p-5 text-center">


                    <h2 class="fw-bold mb-2">
                        Complete Payment
                    </h2>


                    <p class="text-muted">
                        Secure payment powered by Razorpay
                    </p>


                    <div class="my-5">

                        <small class="text-muted">
                            Amount to Pay
                        </small>

                        <h1 class="fw-bold mt-2">

                            ₹<?php
                            echo number_format(
                                $total_amount,
                                2
                            );
                            ?>

                        </h1>

                    </div>


                    <button
                        id="payButton"
                        class="btn btn-success btn-lg w-100"
                    >

                        Pay ₹<?php
                        echo number_format(
                            $total_amount,
                            2
                        );
                        ?>

                    </button>


                    <a
                        href="checkout.php"
                        class="btn btn-outline-secondary w-100 mt-3"
                    >

                        Cancel Payment

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>


<!-- Razorpay Checkout -->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>

const options = {

    key:
        "<?php echo htmlspecialchars($keyId); ?>",

    amount:
        "<?php echo $amount_in_paise; ?>",

    currency:
        "INR",

    name:
        "OwnFood",

    description:
        "Food Order Payment",

    order_id:
        "<?php echo htmlspecialchars($razorpay_order_id); ?>",


    handler: function(response) {

        // Create form automatically
        const form =
            document.createElement("form");

        form.method = "POST";

        form.action =
            "verify-payment.php";


        const paymentId =
            document.createElement("input");

        paymentId.type = "hidden";

        paymentId.name =
            "razorpay_payment_id";

        paymentId.value =
            response.razorpay_payment_id;

        form.appendChild(paymentId);


        const orderId =
            document.createElement("input");

        orderId.type = "hidden";

        orderId.name =
            "razorpay_order_id";

        orderId.value =
            response.razorpay_order_id;

        form.appendChild(orderId);


        const signature =
            document.createElement("input");

        signature.type = "hidden";

        signature.name =
            "razorpay_signature";

        signature.value =
            response.razorpay_signature;

        form.appendChild(signature);


        document.body.appendChild(form);

        form.submit();

    }

};


const razorpay =
    new Razorpay(options);


document
    .getElementById("payButton")
    .addEventListener(
        "click",
        function(event) {

            event.preventDefault();

            razorpay.open();

        }
    );

</script>


</body>

</html>