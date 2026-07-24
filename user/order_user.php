<?php

session_start();

require_once("../config/db.php");

// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

// Get available foods
$sql = "SELECT * FROM menu_items 
        WHERE is_available = 1 
        ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Order Food | OwnFood</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/order-user.css">

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="container">

        <a href="../index.php" class="brand">

            <span class="brand-icon">🍔</span>

            <span>OwnFood</span>

        </a>


        <div class="nav-links">

            <a href="dashboard.php">
                Dashboard
            </a>

            <a href="order_user.php" class="active">
                Order Food
            </a>

            <a href="cart_user.php">

                <i class="bi bi-cart3"></i>
                Cart

            </a>

            <a href="order-history.php">
                My Orders
            </a>

            <a href="../auth/logout.php" class="logout-btn">
                Logout
            </a>

        </div>

    </div>

</nav>


<!-- HERO -->

<section class="order-hero">

    <div class="container">

        <div class="hero-content">

            <span class="hero-label">
                🍴 Fresh & Delicious
            </span>

            <h1>
                What are you craving
                <span>today?</span>
            </h1>

            <p>
                Explore our menu and order your favourite meals.
                Fresh food delivered straight to you.
            </p>

        </div>

    </div>

</section>


<!-- FOOD SECTION -->

<section class="food-section">

    <div class="container">


        <!-- Heading -->

        <div class="food-heading">

            <div>

                <span class="section-label">
                    OUR MENU
                </span>

                <h2>
                    Choose Your Favorite Meal
                </h2>

                <p>
                    Delicious dishes prepared fresh for every order.
                </p>

            </div>


            <!-- Search -->

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="foodSearch"
                    placeholder="Search food..."
                >

            </div>

        </div>


        <!-- CATEGORY BUTTONS -->

        <div class="categories">

            <button class="category-btn active" data-category="all">
                All
            </button>

            <button class="category-btn" data-category="Burger">
                Burger
            </button>

            <button class="category-btn" data-category="Pizza">
                Pizza
            </button>

            <button class="category-btn" data-category="Biryani">
                Biryani
            </button>

            <button class="category-btn" data-category="Main Course">
                Main Course
            </button>

            <button class="category-btn" data-category="Chinese">
                Chinese
            </button>

            <button class="category-btn" data-category="Snacks">
                Snacks
            </button>

            <button class="category-btn" data-category="Dessert">
                Dessert
            </button>

            <button class="category-btn" data-category="Drinks">
                Drinks
            </button>

        </div>


        <!-- FOOD CARDS -->

        <div class="row g-4" id="foodContainer">

            <?php while ($food = $result->fetch_assoc()) { ?>

                <div
                    class="col-lg-4 col-md-6 food-item"
                    data-name="<?php echo strtolower(htmlspecialchars($food["name"])); ?>"
                    data-category="<?php echo htmlspecialchars($food["category"]); ?>"
                >

                    <div class="food-card">


                        <!-- Top -->

                        <div class="food-card-top">

                            <span class="category-tag">

                                <?php
                                echo htmlspecialchars(
                                    $food["category"]
                                );
                                ?>

                            </span>

                            <span class="available">

                                <i class="bi bi-circle-fill"></i>
                                Available

                            </span>

                        </div>


                        <!-- Food Icon -->

                        <div class="food-icon">

                            <?php

                            $category =
                                strtolower($food["category"]);

                            if (str_contains($category, "pizza")) {
                                echo "🍕";
                            }

                            elseif (str_contains($category, "burger")) {
                                echo "🍔";
                            }

                            elseif (str_contains($category, "biryani")) {
                                echo "🍛";
                            }

                            elseif (str_contains($category, "drink")) {
                                echo "🥤";
                            }

                            elseif (str_contains($category, "dessert")) {
                                echo "🍰";
                            }

                            elseif (str_contains($category, "chinese")) {
                                echo "🍜";
                            }

                            elseif (str_contains($category, "snack")) {
                                echo "🍟";
                            }

                            else {
                                echo "🍽️";
                            }

                            ?>

                        </div>


                        <!-- Content -->

                        <div class="food-content">

                            <h3>

                                <?php
                                echo htmlspecialchars(
                                    $food["name"]
                                );
                                ?>

                            </h3>


                            <?php if (!empty($food["description"])) { ?>

                                <p>

                                    <?php
                                    echo htmlspecialchars(
                                        $food["description"]
                                    );
                                    ?>

                                </p>

                            <?php } else { ?>

                                <p>
                                    Freshly prepared and packed
                                    with delicious flavours.
                                </p>

                            <?php } ?>


                            <!-- Bottom -->

                            <div class="food-bottom">

                                <div class="price">

                                    <small>Price</small>

                                    <strong>

                                        ₹<?php
                                        echo number_format(
                                            $food["price"],
                                            2
                                        );
                                        ?>

                                    </strong>

                                </div>


                                <form
                                    action="add-to-cart.php"
                                    method="POST"
                                >

                                    <input
                                        type="hidden"
                                        name="food_id"
                                        value="<?php echo $food["id"]; ?>"
                                    >

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="1"
                                    >


                                    <button
                                        type="submit"
                                        class="add-cart-btn"
                                    >

                                        <i class="bi bi-cart-plus"></i>

                                        Add to Cart

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>


        <!-- No food message -->

        <div id="noFood" class="no-food">

            <i class="bi bi-search"></i>

            <h4>No food found</h4>

            <p>
                Try searching for something else.
            </p>

        </div>


    </div>

</section>


<!-- FOOTER -->

<footer>

    <div class="container">

        <div>

            <strong>
                🍔 OwnFood
            </strong>

            <p>
                Delicious food delivered to your doorstep.
            </p>

        </div>

        <p class="copyright">
            © 2026 OwnFood
        </p>

    </div>

</footer>


<script>

const searchInput =
    document.getElementById("foodSearch");

const foodItems =
    document.querySelectorAll(".food-item");

const categoryButtons =
    document.querySelectorAll(".category-btn");

const noFood =
    document.getElementById("noFood");

let selectedCategory = "all";


function filterFoods() {

    const search =
        searchInput.value.toLowerCase();

    let visibleFoods = 0;


    foodItems.forEach(function(food) {

        const name =
            food.dataset.name;

        const category =
            food.dataset.category;


        const matchesSearch =
            name.includes(search);


        const matchesCategory =
            selectedCategory === "all" ||
            category === selectedCategory;


        if (matchesSearch && matchesCategory) {

            food.style.display = "";
            visibleFoods++;

        } else {

            food.style.display = "none";

        }

    });


    if (visibleFoods === 0) {

        noFood.style.display = "block";

    } else {

        noFood.style.display = "none";

    }

}


searchInput.addEventListener(
    "input",
    filterFoods
);


categoryButtons.forEach(function(button) {

    button.addEventListener("click", function() {

        categoryButtons.forEach(function(btn) {

            btn.classList.remove("active");

        });


        this.classList.add("active");

        selectedCategory =
            this.dataset.category;

        filterFoods();

    });

});

</script>


</body>
</html>