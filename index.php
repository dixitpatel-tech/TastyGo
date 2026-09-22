<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- ================= HEADER ================= -->

<header class="main-header">

    <div class="logo">
       <img src="images/tastygo-logo-cropped.png" alt="TastyGo">
   </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

            <a href="cart.php">
            🛒 Cart
            <?php
            $cart_count = 0;

            if(isset($_SESSION['cart']))
            {
                foreach($_SESSION['cart'] as $cart_item)
                {
                    $cart_count += $cart_item['quantity'];
                }
            }

            if($cart_count > 0)
            {
                echo "($cart_count)";
            }
            ?>
            </a>

            <?php
        if(isset($_SESSION['user_id']))
        {
        ?>

            <a href="my_orders.php">My Orders</a>

            <a href="logout.php">Logout</a>

        <?php
        }
        else
        {
        ?>

            <a href="login.php">Login</a>

            <a href="register.php">Register</a>

        <?php
        }
        ?>

        <a href="contact.php">Contact</a>

    </nav>

</header>


<!-- ================= HERO ================= -->

<section class="zomato-hero">

    <div class="hero-content">

        <h1>Delicious food, delivered to your door</h1>

        <p>
            Discover the best food and order your favourite meals anytime.
        </p>


        <div class="hero-search">

            <span>📍</span>

            <input
                type="text"
                placeholder="Enter your location">

            <span class="search-line"></span>

            <form action="menu.php" method="get">

                <span>🔍</span>

                <input
                    type="text"
                    name="search"
                    placeholder="Search for food">

                <button type="submit">
                    Search
                </button>

            </form>

        </div>

    </div>

</section>


<!-- ================= CATEGORIES ================= -->

<section class="food-categories">

    <h2>Explore Food Categories</h2>

    <p class="section-subtitle">
        Choose from your favourite food
    </p>


    <div class="category-list">

        <a href="menu.php?search=Pizza" class="category-item">
            <div class="category-icon">🍕</div>
            <h3>Pizza</h3>
        </a>


        <a href="menu.php?search=Burger" class="category-item">
            <div class="category-icon">🍔</div>
            <h3>Burger</h3>
        </a>


        <a href="menu.php?search=Fries" class="category-item">
            <div class="category-icon">🍟</div>
            <h3>Fries</h3>
        </a>


        <a href="menu.php?search=Sandwich" class="category-item">
            <div class="category-icon">🥪</div>
            <h3>Sandwich</h3>
        </a>


        <a href="menu.php?search=Noodles" class="category-item">
            <div class="category-icon">🍜</div>
            <h3>Noodles</h3>
        </a>


        <a href="menu.php?search=Drink" class="category-item">
            <div class="category-icon">🥤</div>
            <h3>Drinks</h3>
        </a>


        <a href="menu.php?search=Dosa" class="category-item">
            <div class="category-icon">🥞</div>
            <h3>Dosa</h3>
        </a>


        <a href="menu.php?search=Wrap" class="category-item">
            <div class="category-icon">🌯</div>
            <h3>Wrap</h3>
        </a>

    </div>

</section>


<!-- ================= POPULAR FOODS ================= -->

<section class="popular-section">

    <div class="section-heading">

        <h2>Popular Foods 🔥</h2>

        <a href="menu.php">
            View All →
        </a>

    </div>


    <div class="popular-grid">


        <!-- Pizza -->

        <div class="food-card">

            <img src="images/pizza.jpg" alt="Pizza">

            <div class="food-info">

                <h3>Pizza</h3>

                <p class="food-description">
                    Delicious cheesy pizza
                </p>

                <div class="food-bottom">

                    <strong>₹199</strong>

                    <a href="menu.php?search=Pizza">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Burger -->

        <div class="food-card">

            <img src="images/burger.jpg" alt="Burger">

            <div class="food-info">

                <h3>Burger</h3>

                <p class="food-description">
                    Fresh and tasty burger
                </p>

                <div class="food-bottom">

                    <strong>₹149</strong>

                    <a href="menu.php?search=Burger">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Fries -->

        <div class="food-card">

            <img src="images/fries.jpg" alt="French Fries">

            <div class="food-info">

                <h3>French Fries</h3>

                <p class="food-description">
                    Crispy golden fries
                </p>

                <div class="food-bottom">

                    <strong>₹99</strong>

                    <a href="menu.php?search=Fries">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Cheese Pizza -->

        <div class="food-card">

            <img src="images/cheese_pizza.jpg" alt="Cheese Pizza">

            <div class="food-info">

                <h3>Cheese Pizza</h3>

                <p class="food-description">
                    Extra cheesy delicious pizza
                </p>

                <div class="food-bottom">

                    <strong>₹249</strong>

                    <a href="menu.php?search=Cheese%20Pizza">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Sandwich -->

        <div class="food-card">

            <img src="images/veg_sandwich.jpg" alt="Veg Sandwich">

            <div class="food-info">

                <h3>Veg Sandwich</h3>

                <p class="food-description">
                    Fresh vegetable sandwich
                </p>

                <div class="food-bottom">

                    <strong>₹129</strong>

                    <a href="menu.php?search=Veg%20Sandwich">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Noodles -->

        <div class="food-card">

            <img src="images/hakka_noodles.jpg" alt="Hakka Noodles">

            <div class="food-info">

                <h3>Hakka Noodles</h3>

                <p class="food-description">
                    Hot and spicy noodles
                </p>

                <div class="food-bottom">

                    <strong>₹169</strong>

                    <a href="menu.php?search=Hakka%20Noodles">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Dosa -->

        <div class="food-card">

            <img src="images/masala_dosa.jpg" alt="Masala Dosa">

            <div class="food-info">

                <h3>Masala Dosa</h3>

                <p class="food-description">
                    Crispy South Indian dosa
                </p>

                <div class="food-bottom">

                    <strong>₹149</strong>

                    <a href="menu.php?search=Masala%20Dosa">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>


        <!-- Wrap -->

        <div class="food-card">

            <img src="images/paneer_wrap.jpg" alt="Paneer Wrap">

            <div class="food-info">

                <h3>Paneer Wrap</h3>

                <p class="food-description">
                    Delicious paneer wrap
                </p>

                <div class="food-bottom">

                    <strong>₹139</strong>

                    <a href="menu.php?search=Paneer%20Wrap">
                        <button>Order</button>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= WHY US ================= -->

<section class="why-section">

    <h2>Why Choose TastyGo?</h2>

    <div class="why-grid">

        <div class="why-box">

            <div>🚀</div>

            <h3>Fast Delivery</h3>

            <p>
                Get your favourite food delivered quickly.
            </p>

        </div>


        <div class="why-box">

            <div>🍽️</div>

            <h3>Fresh Food</h3>

            <p>
                Fresh and delicious food for every order.
            </p>

        </div>


        <div class="why-box">

            <div>💳</div>

            <h3>Easy Ordering</h3>

            <p>
                Simple and easy food ordering experience.
            </p>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="tg-footer">

    <div class="tg-footer-top">

        <div class="tg-footer-brand">
            <h2>TastyGo</h2>
            <p>Delicious food delivered to your doorstep.</p>
        </div>

        <div class="tg-footer-column">
            <h3>About TastyGo</h3>
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="tg-footer-column">
            <h3>For You</h3>
            <a href="cart.php">Your Cart</a>
            <a href="my_orders.php">My Orders</a>
            <a href="login.php">Login</a>
        </div>

        <div class="tg-footer-column">
            <h3>Connect With Us</h3>
            <p>📧 support@tastygo.com</p>
            <p>📞 +91 98765 43210</p>
            <p>📍 Gandhinagar, Gujarat</p>
        </div>

    </div>

    <div class="tg-footer-bottom">
        <p>© 2026 TastyGo. All Rights Reserved.</p>
        <p>Made with ❤️ for food lovers</p>
    </div>

</footer>
</body>

</html>