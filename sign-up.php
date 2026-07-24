<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | OwnFood</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/signup.css">

</head>

<body>

    <section class="auth-section">

        <div class="auth-container">

            <!-- Left Side -->

            <div class="left-panel">

                <div class="logo">
                    🍔 <span>OwnFood</span>
                </div>

                <h1>Fresh Food,<br>Delivered Fast.</h1>

                <p>
                    Join thousands of food lovers and enjoy your favourite meals delivered fresh to your doorstep.
                </p>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>
                        <h5>Fast Delivery</h5>
                        <p>Hot meals delivered in under 30 minutes.</p>
                    </div>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>
                        <h5>Fresh Ingredients</h5>
                        <p>Prepared with premium quality ingredients.</p>
                    </div>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>
                        <h5>Secure Payments</h5>
                        <p>Safe and hassle-free online transactions.</p>
                    </div>

                </div>

            </div>

            <!-- Right Side -->

            <div class="right-panel">

                <h2>Create Account</h2>

                <p>Create your account and start ordering delicious food.</p>

                <form action="auth/signup.php" method="POST">
                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>

                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>

                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>

                    <input type="password" name="password" class="form-control" placeholder="Password" required>

                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"
                        required>

                    <button type="submit" class="signup-btn">
                        Create Account
                    </button>
                </form>
                <div class="login-link">

                    Already have an account?

                    <a href="log-in.php">Login</a>

                </div>
            </div>

        </div>

    </section>

</body>

</html>