<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | OwnFood</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/signup.css">

</head>

<body>

    <section class="auth-section">

        <div class="auth-container">

            <!-- Left Panel -->

            <div class="left-panel">

                <div class="logo">
                    🍔 <span>OwnFood</span>
                </div>

                <h1>
                    Welcome Back!
                </h1>

                <p>
                    Sign in to continue ordering your favourite meals and track your orders with ease.
                </p>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>

                        <h5>Quick Ordering</h5>

                        <p>
                            Order your favourite meals in just a few clicks.
                        </p>

                    </div>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>

                        <h5>Real-Time Tracking</h5>

                        <p>
                            Track your food from the kitchen to your doorstep.
                        </p>

                    </div>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <div>

                        <h5>Exclusive Offers</h5>

                        <p>
                            Enjoy exciting discounts and reward points.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Right Panel -->

            <div class="right-panel">

                <h2>Login</h2>

                <p>
                    Enter your credentials to access your account.
                </p>

                <form action="auth/login.php" method="POST">

                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>

                    <input type="password" name="password" class="form-control" placeholder="Password" required>

                    <div class="forgot-password">
                        <a href="#">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit" class="signup-btn">
                        Login
                    </button>

                </form>

                <div class="login-link">

                    Don't have an account?

                    <a href="sign-up.php">
                        Create Account
                    </a>

                </div>

            </div>

        </div>

    </section>

</body>

</html>