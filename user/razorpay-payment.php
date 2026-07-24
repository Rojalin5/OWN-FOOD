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

// Get cart items
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

if ($result->num_rows === 0) {
    header("Location: cart_user.php");
    exit();
}


// Calculate total
$total_amount = 0;

while ($item = $result->fetch_assoc()) {

    $total_amount +=
        $item["price"] * $item["quantity"];
}


// Razorpay requires amount in paise
$amount_in_paise = (int) round($total_amount * 100);


// Create Razorpay Order
$razorpayOrder = $api->order->create([
    "receipt" => "ownfood_" . time(),
    "amount" => $amount_in_paise,
    "currency" => "INR"
]);

$razorpay_order_id = $razorpayOrder["id"];

// Save Razorpay order ID in session
$_SESSION["razorpay_order_id"] = $razorpay_order_id;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Online Payment | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-5 text-center">

                    <h2 class="fw-bold">
                        Complete Payment
                    </h2>

                    <p class="text-muted">
                        Pay securely using Razorpay
                    </p>

                    <h3 class="my-4">

                        ₹<?php echo number_format($total_amount, 2); ?>

                    </h3>

                    <button
                        id="pay-button"
                        class="btn btn-success btn-lg w-100">

                        Pay Now

                    </button>

                    <a
                        href="checkout.php"
                        class="btn btn-outline-secondary w-100 mt-3">

                        Cancel

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

const options = {

    key: "<?php echo htmlspecialchars($keyId); ?>",

    amount: "<?php echo $amount_in_paise; ?>",

    currency: "INR",

    name: "OwnFood",

    description: "Food Order Payment",

    order_id: "<?php echo htmlspecialchars($razorpay_order_id); ?>",

    handler: function (response) {

        const form = document.createElement("form");

        form.method = "POST";
        form.action = "verify-payment.php";


        const fields = {

            razorpay_payment_id:
                response.razorpay_payment_id,

            razorpay_order_id:
                response.razorpay_order_id,

            razorpay_signature:
                response.razorpay_signature

        };


        for (const key in fields) {

            const input =
                document.createElement("input");

            input.type = "hidden";

            input.name = key;

            input.value = fields[key];

            form.appendChild(input);
        }


        document.body.appendChild(form);

        form.submit();
    },

    theme: {
        color: "#198754"
    }

};


const razorpay =
    new Razorpay(options);


document
    .getElementById("pay-button")
    .onclick = function (e) {

        razorpay.open();

        e.preventDefault();
    };

</script>

</body>

</html>