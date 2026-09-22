<?php
session_start();
include("includes/db.php");

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $result = mysqli_query($conn,
        "SELECT * FROM food
         WHERE name LIKE '%$search%'
         OR description LIKE '%$search%'"
    );
}
else
{
    $result = mysqli_query($conn, "SELECT * FROM food");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Menu - TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- ================= HEADER ================= -->

<header class="z-menu-header">

    <div class="z-logo">
      <a href="index.php">
        <img src="images/tastygo-logo-cropped.png" alt="TastyGo">
      </a>
    </div>

    <div class="z-search">

        <span>🔍</span>

        <form method="get" action="menu.php">

            <input
                type="text"
                name="search"
                placeholder="Search for food..."
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
            >

        </form>

    </div>

    <nav class="z-nav">

        <a href="index.php">Home</a>

        <a href="menu.php" class="z-active">Menu</a>

        <a href="cart.php">🛒 Cart</a>

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

    </nav>

</header>


<!-- ================= MAIN ================= -->

<main class="z-menu-main">


    <!-- TITLE -->

    <section class="z-menu-title">

        <h1>Explore Our Menu</h1>

        <p>Discover delicious food made just for you</p>

    </section>


    <!-- ================= CATEGORIES ================= -->

    <section class="z-categories">

        <div class="z-category active">
            <span>🍽️</span>
            <p>All</p>
        </div>

        <a href="menu.php?search=Pizza" class="z-category">
            <span>🍕</span>
            <p>Pizza</p>
        </a>

        <a href="menu.php?search=Burger" class="z-category">
            <span>🍔</span>
            <p>Burger</p>
        </a>

        <a href="menu.php?search=Fries" class="z-category">
            <span>🍟</span>
            <p>Fries</p>
        </a>

        <a href="menu.php?search=Sandwich" class="z-category">
            <span>🥪</span>
            <p>Sandwich</p>
        </a>

        <a href="menu.php?search=Noodles" class="z-category">
            <span>🍜</span>
            <p>Noodles</p>
        </a>

        <a href="menu.php?search=Dosa" class="z-category">
            <span>🥞</span>
            <p>Dosa</p>
        </a>

        <a href="menu.php?search=Wrap" class="z-category">
            <span>🌯</span>
            <p>Wrap</p>
        </a>

        <a href="menu.php?search=Drink" class="z-category">
            <span>🥤</span>
            <p>Drinks</p>
        </a>

    </section>


    <!-- ================= SEARCH RESULT ================= -->

    <?php
    if(isset($_GET['search']) && $_GET['search'] != "")
    {
    ?>

        <div class="z-search-result">

            Search results for
            <strong>
                "<?php echo htmlspecialchars($_GET['search']); ?>"
            </strong>

        </div>

    <?php
    }
    ?>


    <!-- ================= FOOD SECTION ================= -->

    <section class="z-food-section">

        <div class="z-section-heading">

            <div>

                <h2>Popular Food</h2>

                <p>Best dishes you can order today</p>

            </div>

        </div>


        <div class="z-food-grid">

        <?php

        if(mysqli_num_rows($result) > 0)
        {

            while($food = mysqli_fetch_assoc($result))
            {

        ?>

            <!-- FOOD CARD -->

            <div class="z-food-card">


                <!-- IMAGE -->

                <div class="z-food-image">

                    <img
                        src="images/<?php echo htmlspecialchars($food['image']); ?>"
                        alt="<?php echo htmlspecialchars($food['name']); ?>"
                    >

                    <button class="z-favourite">
                        ♡
                    </button>

                </div>


                <!-- DETAILS -->

                <div class="z-food-details">

                    <h3>
                        <?php echo htmlspecialchars($food['name']); ?>
                    </h3>


                    <p class="z-description">

                        <?php echo htmlspecialchars($food['description']); ?>

                    </p>


                    <div class="z-food-bottom">


                        <div class="z-price">

                            ₹<?php echo number_format($food['price'], 0); ?>

                        </div>


                        <form method="post" action="cart.php">

                            <input
                                type="hidden"
                                name="item"
                                value="<?php echo htmlspecialchars($food['name']); ?>"
                            >

                            <input
                                type="hidden"
                                name="price"
                                value="<?php echo $food['price']; ?>"
                            >

                            <button
                                type="submit"
                                class="z-add-btn"
                            >
                                Add
                            </button>

                        </form>

                    </div>

                </div>

            </div>


        <?php

            }

        }
        else
        {

        ?>

            <div class="z-no-food">

                <div>😔</div>

                <h2>No food found</h2>

                <p>Try searching for another food item.</p>

                <a href="menu.php">
                    View All Food
                </a>

            </div>

        <?php

        }

        ?>

        </div>

    </section>

</main>


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