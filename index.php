<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OWN FOOD - HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/home.css" class="style">
    <link rel="stylesheet" href="assets/css/common.css" class="common">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="assets/img/logo.png" alt="Own Food Logo" class="logo">
                <span class="brand-name ms-2">Own Food</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="offer.php">Offers </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="cart-btn">
                        <i class="bi bi-bag"></i>
                        <span class="cart-count">2</span>
                    </a>

                    <a href="log-in.php" class="btn login-btn">
                        Login
                    </a>

                    <a href="sign-up.php" class="btn signup-btn">
                        Sign Up
                    </a>

                </div>

            </div>

        </div>
    </nav>
    <!-- Hero Section -->

    <section class="hero">

        <div class="container">

            <div class="hero-content">

                <span class="hero-badge">
                    <i class="bi bi-star-fill"></i>
                    Rated 4.9 by 10,000+ Customers
                </span>

                <h1 class="hero-title">
                    Fresh Food <br>
                    Delivered <br>
                    <span>To Your Doorstep</span>
                </h1>

                <p class="hero-text">
                    Discover delicious meals from your favourite restaurants.
                    Fast delivery, easy online ordering, and unforgettable taste,
                    all in one place.
                </p>

                <!-- Stats -->

                <div class="hero-stats">

                    <div class="stat-box">
                        <h3>10K+</h3>
                        <p>Happy Customers</p>
                    </div>

                    <div class="stat-box">
                        <h3>500+</h3>
                        <p>Restaurants</p>
                    </div>

                    <div class="stat-box">
                        <h3>30 Min</h3>
                        <p>Average Delivery</p>
                    </div>

                </div>

                <!-- Search -->

                <div class="hero-search">

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text" class="form-control" placeholder="Search food, restaurants...">

                        <select class="form-select">

                            <option>Kolkata</option>
                            <option>Delhi</option>
                            <option>Mumbai</option>

                        </select>

                    </div>

                </div>

                <!-- Buttons -->

                <div class="hero-buttons">

                    <a href="#" class="btn order-btn">
                        Order Now
                    </a>

                    <a href="#" class="btn menu-btn">
                        Explore Menu
                    </a>

                </div>

            </div>

        </div>

    </section>
    <!-- Features Section -->
    <section class="features">

        <div class="container">

            <div class="section-heading">

                <span class="section-tag">
                    WHY CHOOSE US
                </span>

                <h2>
                    Everything You Need For <br>
                    A Better Food Experience
                </h2>

                <p>
                    From lightning-fast delivery to premium catering services,
                    we make every meal memorable.
                </p>

            </div>

            <div class="row g-4">

                <!-- Card 1 -->

                <div class="col-lg-4">

                    <div class="feature-card">

                        <img src="https://images.pexels.com/photos/37059837/pexels-photo-37059837.jpeg" alt="Delivery">

                        <div class="feature-content">

                            <div class="feature-icon">
                                <i class="bi bi-bicycle"></i>
                            </div>

                            <h4>Fast Delivery</h4>

                            <p>
                                Get your favourite meals delivered
                                within 30 minutes with real-time
                                order tracking.
                            </p>

                            <a href="#">
                                Learn More
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Card 2 -->

                <div class="col-lg-4">

                    <div class="feature-card">

                        <img src="https://images.pexels.com/photos/30639153/pexels-photo-30639153.jpeg" alt="Catering">

                        <div class="feature-content">

                            <div class="feature-icon">
                                <i class="bi bi-cup-hot"></i>
                            </div>

                            <h4>Fresh & Hygienic Food</h4>

                            <p>
                                Every meal is prepared with fresh ingredients and follows strict hygiene standards.
                            </p>

                            <a href="#">
                                Learn More
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Card 3 -->

                <div class="col-lg-4">

                    <div class="feature-card">

                        <img src="https://images.pexels.com/photos/4008580/pexels-photo-4008580.jpeg" alt="Reservation">

                        <div class="feature-content">

                            <div class="feature-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>

                            <h4>Easy Online Ordering</h4>

                            <p>
                                Browse the menu, customize your meal, and place your order in just a few clicks.
                            </p>

                            <a href="#">
                                Learn More
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- menu section -->
    <section class="menu py-5 px-5">
        <div class="menu-header">
            <div>
                <span class="section-tag">
                    POPULAR MENU
                </span>
                <h2>
                    Popular Near You
                </h2>
                <p>
                    Freshly prepared meals from our top-rated restaurants.
                </p>
            </div>
            <div class="meal-search">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search meals">
                </div>
            </div>
        </div>
        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/17696656/pexels-photo-17696656.jpeg"
                            alt="Chicken Biryani">
                        <span class="food-badge">Best Seller</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Chicken Biryani</h5>
                            <span class="price">₹249</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.8</span>
                            <span><i class="bi bi-clock"></i> 25 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/27793841/pexels-photo-27793841.jpeg"
                            alt="Margherita Pizza">
                        <span class="food-badge">Best Seller</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Margherita Pizza</h5>
                            <span class="price">₹299</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.6</span>
                            <span><i class="bi bi-clock"></i> 30 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/10500520/pexels-photo-10500520.jpeg"
                            alt="Classic Cheeseburger">
                        <span class="food-badge">Popular</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Cheeseburger</h5>
                            <span class="price">₹199</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.5</span>
                            <span><i class="bi bi-clock"></i> 20 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/30858402/pexels-photo-30858402.jpeg"
                            alt="Paneer Butter Masala">
                        <span class="food-badge">Chef's Pick</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5 style="font-size: 18px;">Paneer Butter Masala</h5>
                            <span class="price">₹229</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.7</span>
                            <span><i class="bi bi-clock"></i> 25 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/3926135/pexels-photo-3926135.jpeg"
                            alt="Veg Hakka Noodles">
                        <span class="food-badge">Trending</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5 style="font-size: 18px;">Veg Hakka Noodles</h5>
                            <span class="price">₹200</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.4</span>
                            <span><i class="bi bi-clock"></i> 20 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/20422129/pexels-photo-20422129.jpeg"
                            alt="Masala Dosa">
                        <span class="food-badge">Best Seller</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Masala Dosa</h5>
                            <span class="price">₹100</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.8</span>
                            <span><i class="bi bi-clock"></i> 25 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/5711231/pexels-photo-5711231.jpeg" alt="Waffle">
                        <span class="food-badge">Sweet Treat</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Belgian Waffle</h5>
                            <span class="price">₹169</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.8</span>
                            <span><i class="bi bi-clock"></i> 25 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <div class="food-image">
                        <img src="https://images.pexels.com/photos/15228660/pexels-photo-15228660.jpeg"
                            alt="Chocolate Brownie">
                        <span class="food-badge">Best Seller</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="food-content">
                        <div class="food-info">
                            <h5>Chocolate Brownie</h5>
                            <span class="price">₹149</span>
                        </div>
                        <div class="food-meta">
                            <span><i class="bi bi-star-fill"></i> 4.9</span>
                            <span><i class="bi bi-clock"></i> 15 min</span>
                        </div>
                        <button class="add-cart-btn"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <section class="offer-section">
        <div class="container">
            <div class="offer-banner row align-items-center">

                <div class="col-lg-7">
                    <span class="offer-tag">🔥 Limited Time Offer</span>

                    <h2>Get <span>20% OFF</span> On Your First Order</h2>

                    <p>
                        Enjoy freshly prepared meals delivered straight to your doorstep.
                        Use the promo code below and save on your first order today.
                    </p>

                    <div class="offer-action">
                        <div class="offer-code">
                            <span>Promo Code</span>
                            <h4>WELCOME20</h4>
                        </div>

                        <a href="#menu" class="offer-btn">
                            Order Now <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="Offer Food"
                        class="offer-image">
                </div>

            </div>
        </div>
    </section>
    <section class="how-it-works">
        <div class="container">

            <div class="section-heading">
                <span class="section-tag">HOW IT WORKS</span>
                <h2>Order Food In 3 Simple Steps</h2>
                <p>Enjoy delicious meals delivered to your doorstep in just a few easy clicks.</p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">01</div>

                        <div class="step-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <h4>Choose Your Food</h4>

                        <p>Browse our delicious menu and discover your favorite meals from top-rated restaurants.</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">02</div>

                        <div class="step-icon">
                            <i class="bi bi-cart-plus"></i>
                        </div>

                        <h4>Add To Cart</h4>

                        <p>Select your meals, customize your order, and complete your checkout in seconds.</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">03</div>

                        <div class="step-icon">
                            <i class="bi bi-bicycle"></i>
                        </div>

                        <h4>Fast Delivery</h4>

                        <p>Our delivery partners ensure your food reaches you fresh, hot, and right on time.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="reviews">
        <div class="container">

            <div class="section-heading">
                <span class="section-tag">TESTIMONIALS</span>
                <h2>What Our Customers Say</h2>
                <p>Thousands of happy customers trust us for delicious meals and quick delivery.</p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="review-card">

                        <div class="review-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="review-text">
                            "The food arrived hot and fresh, and the delivery was incredibly fast. Ordering was smooth
                            and hassle-free."
                        </p>

                        <div class="review-user">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Priya Sharma">

                            <div>
                                <h5>Priya Sharma</h5>
                                <span>Regular Customer</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="review-card">

                        <div class="review-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="review-text">
                            "Amazing quality, generous portions, and quick service. This has become my favorite food
                            delivery platform."
                        </p>

                        <div class="review-user">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Aman Verma">

                            <div>
                                <h5>Aman Verma</h5>
                                <span>Food Blogger</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="review-card">

                        <div class="review-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="review-text">
                            "The interface is simple, delivery is always on time, and every meal tastes fresh and
                            delicious."
                        </p>

                        <div class="review-user">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Abhishek Dey">

                            <div>
                                <h5>Abhishek Dey</h5>
                                <span>Verified Customer</span>
                            </div>
                        </div>

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
                        Delicious meals delivered fresh to your doorstep. Experience fast delivery, premium quality, and
                        unforgettable taste every time you order.
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>