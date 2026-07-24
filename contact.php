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
    <link rel="stylesheet" href="assets/css/contact.css" class="style">
    <link rel="stylesheet" href="assets/css/common.css" class="common">
</head>
<body>
        <nav class="navbar navbar-expand-lg order-navbar sticky-top">
    <div class="container">

      <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="assets/img/logo.png" alt="Own Food Logo" class="logo">
                <span class="brand-name ms-2">Own Food</span>
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
                    <a class="nav-link" href="offer.php">Offers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Contact</a>
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
<section class="contact-hero">

    <div class="container">

        <div class="hero-content">

            <span class="section-tag">
                📞 Contact Us
            </span>

            <h1>
                We'd Love To Hear From You
            </h1>

            <p>
                Have a question, feedback, or need help with your order?
                Our team is always ready to assist you.
            </p>

        </div>

    </div>

</section>

<section class="contact-section">

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-5">

                <div class="contact-info">

                    <h2>Get In Touch</h2>

                    <p>
                        Reach out to us through any of the following ways.
                    </p>

                    <div class="info-item">

                        <i class="bi bi-geo-alt-fill"></i>

                        <div>
                            <h5>Address</h5>
                            <p>Salt Lake, Kolkata, India</p>
                        </div>

                    </div>

                    <div class="info-item">

                        <i class="bi bi-telephone-fill"></i>

                        <div>
                            <h5>Phone</h5>
                            <p>+91 98765 43210</p>
                        </div>

                    </div>

                    <div class="info-item">

                        <i class="bi bi-envelope-fill"></i>

                        <div>
                            <h5>Email</h5>
                            <p>support@ownfood.com</p>
                        </div>

                    </div>

                    <div class="info-item">

                        <i class="bi bi-clock-fill"></i>

                        <div>
                            <h5>Working Hours</h5>
                            <p>Mon - Sun : 9 AM - 11 PM</p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-7">

                <div class="contact-form">

                    <h2>Send Message</h2>

                    <form>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Your Name">

                            </div>

                            <div class="col-md-6 mb-4">

                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email Address">

                            </div>

                        </div>

                        <input
                            type="text"
                            class="form-control mb-4"
                            placeholder="Subject">

                        <textarea
                            class="form-control mb-4"
                            rows="6"
                            placeholder="Write your message..."></textarea>

                        <button class="send-btn">
                            Send Message
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="map-section">

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18..."
        allowfullscreen=""
        loading="lazy">
    </iframe>
</section>
<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-4">
                <a href="#" class="footer-logo">
                    <img src="img/logo.png" alt="Logo">
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