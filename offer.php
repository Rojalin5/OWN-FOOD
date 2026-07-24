<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/offer.css" class="style">
    <link rel="stylesheet" href="assets/css/common.css" class="common">

</head>
<body>
      <nav class="navbar navbar-expand-lg order-navbar sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/img/logo.png" class="logo" alt="Logo">
            <span class="brand-name">OwnFood</span>
        </a>

        <div class="collapse navbar-collapse">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="order.php">Order</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Offers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

            </ul>

            <a href="#" class="cart-btn me-4">
                <i class="bi bi-bag-fill"></i>
                <span class="cart-count">3</span>
            </a>

            <a href="log-in.php" class="btn login-btn me-2">Login</a>
            <a href="sign-up.php" class="btn signup-btn">Sign Up</a>
        </div>
    </div>
</nav>
<section class="offer-hero">

    <div class="container  text-center">

        <div class="offer-content text-center">

            <span class="section-tag">
                🔥 Today's Best Deals
            </span>

            <h1>
                Save More With
                <span>Exclusive Food Offers</span>
            </h1>

            <p>
                Discover exciting discounts, combo meals and special deals.
                Enjoy premium food at the best prices every day.
            </p>

            <div class="offer-buttons">

                <a href="order.php" class="btn-order">
                    Order Now
                </a>

                <a href="offer.php" class="btn-view">
                    Explore Offers
                </a>

            </div>

            <div class="offer-stats">

                <div class="stat-card">

                    <h2>20%</h2>

                    <p>First Order Discount</p>

                </div>

                <div class="stat-card">

                    <h2>50+</h2>

                    <p>Daily Deals</p>

                </div>

                <div class="stat-card">

                    <h2>1000+</h2>

                    <p>Happy Customers</p>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="offers-section" id="offers">

    <div class="container">

        <div class="section-title">

            <span>Special Offers</span>

            <h2>Today's Exclusive Deals</h2>

            <p>
                Grab these limited-time offers before they're gone.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="offer-card">

                    <div class="offer-badge">
                        20% OFF
                    </div>

                    <h3>First Order Special</h3>

                    <p>
                        Get 20% off on your very first order with OwnFood.
                    </p>

                    <div class="offer-footer">

                        <span class="coupon">
                            NEW20
                        </span>

                        <a href="order.php" class="claim-btn">
                            Claim
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="offer-card">

                    <div class="offer-badge">
                        Buy 1 Get 1
                    </div>

                    <h3>Pizza Fiesta</h3>

                    <p>
                        Buy one pizza and get another absolutely free.
                    </p>

                    <div class="offer-footer">

                        <span class="coupon">
                            BOGO
                        </span>

                        <a href="order.php" class="claim-btn">
                            Claim
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="offer-card">

                    <div class="offer-badge">
                        ₹150 OFF
                    </div>

                    <h3>Weekend Combo</h3>

                    <p>
                        Flat ₹150 off on orders above ₹999 every weekend.
                    </p>

                    <div class="offer-footer">

                        <span class="coupon">
                            WEEKEND
                        </span>

                        <a href="order.php" class="claim-btn">
                            Claim
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="offer-cta">

    <div class="container">

        <div class="cta-box">

            <span class="cta-tag">
                🍽 Limited Time Offers
            </span>

            <h2>
                Don't Miss Today's Delicious Deals
            </h2>

            <p>
                Order your favorite meals now and enjoy exclusive discounts before they expire.
            </p>

            <a href="order.php" class="cta-btn">
                Order Now
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</section>
<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-4">
                <a href="#" class="footer-logo">
                    <img src="assets/img/logo.png" alt="Logo">
                    <span>OwnFood</span>
                </a>

                <p class="footer-text">
                    Delicious meals delivered fresh to your doorstep. Experience fast delivery, premium quality, and unforgettable taste every time you order.
                </p>

                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2">
                <h5>Quick Links</h5>

                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Offers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5>Our Services</h5>

                <ul class="footer-links">
                    <li><a href="#">Food Delivery</a></li>
                    <li><a href="#">Table Reservation</a></li>
                    <li><a href="#">Catering</a></li>
                    <li><a href="#">Online Ordering</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5>Contact</h5>

                <div class="contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Kolkata, West Bengal</span>
                </div>

                <div class="contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>support@ownfood.com</span>
                </div>

                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+91 98765 43210</span>
                </div>
            </div>

        </div>

        <hr>

        <div class="footer-bottom">
            <p>© 2026 OwnFood. All Rights Reserved.</p>

            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
        </div>

    </div>

</footer>
</body>
</html>