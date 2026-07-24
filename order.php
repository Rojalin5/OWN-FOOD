<!DOCTYPE html>
<html lang="en"></html>
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
    <link rel="stylesheet" href="assets/css/order.css" class="style">
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
                    <a class="nav-link active" href="#">Order</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="offer.php">Offers</a>
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
<section class="order-hero">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="hero-tag">
                    <i class="bi bi-fire"></i>
                    Fresh & Fast Delivery
                </span>

                <h1>Order Your Favorite Food Anytime</h1>

                <p>
                    Choose from hundreds of delicious meals prepared with fresh ingredients and delivered straight to your doorstep in minutes.
                </p>

                <form class="hero-search">

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text" class="form-control" placeholder="Search for pizza, burger, pasta...">

                        <button class="btn hero-search-btn">
                            Search
                        </button>

                    </div>

                </form>

            </div>

            <div class="col-lg-6 text-end">

                <img src="assets/img/order_h.png" class="order-banner" alt="Food">
            </div>
        </div>
    </div>
</section>
<section class="food-categories">
    <div class="container">

        <div class="section-heading text-center">
            <span class="section-tag">CATEGORIES</span>
            <h2>Browse By Category</h2>
            <p>Choose your favorite cuisine and discover delicious meals prepared just for you.</p>
        </div>

<div class="category-wrapper">

    <button class="category-card active" style="padding-top: 18px;">
    <img src="assets/img/p.png" class="order-banner" alt="Food">
        <span>Pizza</span>
    </button>

    <button class="category-card" style="padding-top: 18px;">
        <img src="assets/img/b.png" class="order-banner" alt="Food">
        <span>Burger</span>
    </button>

    <button class="category-card"style="padding-top: 18px;">
        <img src="assets/img/c.png" class="order-banner" alt="Food">
        <span>Chicken</span>
    </button>

    <button class="category-card" style="padding-top: 18px;">
        <img src="assets/img/n.png" class="order-banner" alt="Food">
        <span>Noodles</span>
    </button>

    <button class="category-card" style="padding-top: 18px;">
        <img src="assets/img/i.png" class="order-banner" alt="Food">
        <span>Indian</span>
    </button>

    <button class="category-card" style="padding-top: 18px;">
        <img src="assets/img/s.png" class="order-banner" alt="Food">
        <span>Salad</span>
    </button>

    <button class="category-card"style="padding-top: 18px;">
        <img src="assets/img/brownie.png" class="order-banner" alt="Food">
        <span>Desserts</span>
    </button>

    <button class="category-card" style="padding-top: 18px;">
        <img src="assets/img/d.png" class="order-banner" alt="Food">
        <span>Drinks</span>
    </button>

</div>
    </div>
</section>
<section class="how-order-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-tag">
                EASY ORDERING
            </span>

            <h2>How It Works</h2>

            <p>
                Your favourite food is just a few simple steps away.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
<div class="order-step"
     style="border: 2px solid #ff6338; border-radius: 12px; padding: 25px; height: 100%;">
                    <div class="step-number">01</div>

                    <div class="step-icon">
                        <i class="bi bi-search"></i>
                    </div>

                    <h4>Browse Menu</h4>

                    <p>
                        Explore a variety of delicious meals
                        from different categories.
                    </p>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
<div class="order-step"
     style="border: 2px solid #ff6338; border-radius: 12px; padding: 25px; height: 100%;">
                    <div class="step-number">02</div>

                    <div class="step-icon">
                        <i class="bi bi-person-check"></i>
                    </div>

                    <h4>Login or Sign Up</h4>

                    <p>
                        Create your OwnFood account or
                        login to start ordering.
                    </p>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
<div class="order-step"
     style="border: 2px solid #ff6338; border-radius: 12px; padding: 25px; height: 100%;">
                    <div class="step-number">03</div>

                    <div class="step-icon">
                        <i class="bi bi-cart-plus"></i>
                    </div>

                    <h4>Add to Cart</h4>

                    <p>
                        Select your favourite dishes and
                        add them to your cart.
                    </p>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
<div class="order-step"
     style="border: 2px solid #ff6338; border-radius: 12px; padding: 25px; height: 100%;">
                    <div class="step-number">04</div>

                    <div class="step-icon">
                        <i class="bi bi-bag-check"></i>
                    </div>

                    <h4>Place Your Order</h4>

                    <p>
                        Checkout securely and enjoy
                        your delicious meal.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>
<section class="faq-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-tag">FAQ</span>

            <h2>Frequently Asked Questions</h2>

            <p>
                Find answers to the most common questions about ordering,
                delivery and payments.
            </p>

        </div>

        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">

                        How long does delivery take?

                    </button>

                </h2>

                <div id="faq1"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Most orders are delivered within
                        <strong>20–35 minutes</strong>
                        depending on your location.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">

                        Which payment methods are accepted?

                    </button>

                </h2>

                <div id="faq2"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        We accept Credit Cards,
                        Debit Cards,
                        UPI,
                        Net Banking
                        and Cash on Delivery.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">

                        Can I cancel my order?

                    </button>

                </h2>

                <div id="faq3"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes, you can cancel before
                        your order is prepared.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">

                        Do you offer contactless delivery?

                    </button>

                </h2>

                <div id="faq4"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. Simply choose
                        Contactless Delivery
                        during checkout.

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="section-tag">
                        READY TO ORDER?
                    </span>

                    <h2>
                        Delicious Food Is Just One Click Away
                    </h2>

                    <p>
                        Order your favorite meals from OwnFood and enjoy
                        fast delivery, fresh ingredients, and amazing
                        discounts every day.
                    </p>

                </div>

                <div class="col-lg-4 text-lg-end">

                    <a href="#" class="cta-btn">
                        Order Now
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

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