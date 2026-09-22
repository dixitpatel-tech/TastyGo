<?php
session_start();

// Add item to cart
if(isset($_POST['item']))
{
    $item = $_POST['item'];
    $price = $_POST['price'];

    $found = false;

    if(isset($_SESSION['cart']))
    {
        foreach($_SESSION['cart'] as $key => $cart)
        {
            if($cart['item'] == $item)
            {
                $_SESSION['cart'][$key]['quantity']++;
                $found = true;
                break;
            }
        }
    }

    if(!$found)
    {
        $_SESSION['cart'][] = [
            'item' => $item,
            'price' => $price,
            'quantity' => 1
        ];
    }
}

// Increase quantity
if(isset($_POST['increase']))
{
    $index = $_POST['increase'];
    $_SESSION['cart'][$index]['quantity']++;
}

// Decrease quantity
if(isset($_POST['decrease']))
{
    $index = $_POST['decrease'];
    $_SESSION['cart'][$index]['quantity']--;

    if($_SESSION['cart'][$index]['quantity'] <= 0)
    {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Remove item
if(isset($_POST['remove']))
{
    $index = $_POST['remove'];

    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Clear cart
if(isset($_POST['clear']))
{
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Cart - TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="main-header">

    <div class="logo">
        <h1>TastyGo</h1>
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php" class="active">
            🛒 Cart
        </a>

        <a href="contact.php">Contact</a>

    </nav>

</header>


<section class="tg-cart-page">

    <div class="tg-cart-container">

        <!-- LEFT SIDE -->

        <div class="tg-cart-left">

            <div class="tg-cart-heading">

                <h1>Your Cart</h1>

                <p>
                    Review your items before checkout
                </p>

            </div>


            <?php

            if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
            {

                $total = 0;

                foreach($_SESSION['cart'] as $index => $cart)
                {

                    $item_total =
                        $cart['price'] * $cart['quantity'];

                    $total =
                        $total + $item_total;

            ?>

                    <div class="tg-cart-item">

                        <div class="tg-item-info">

                            <h3>
                                <?php echo htmlspecialchars($cart['item']); ?>
                            </h3>

                            <p>
                                ₹<?php echo number_format($cart['price'], 0); ?>
                                per item
                            </p>

                        </div>


                        <div class="tg-quantity">

                            <form method="post">

                                <button
                                    type="submit"
                                    name="decrease"
                                    value="<?php echo $index; ?>">
                                    −
                                </button>

                            </form>


                            <strong>
                                <?php echo $cart['quantity']; ?>
                            </strong>


                            <form method="post">

                                <button
                                    type="submit"
                                    name="increase"
                                    value="<?php echo $index; ?>">
                                    +
                                </button>

                            </form>

                        </div>


                        <div class="tg-item-total">

                            <strong>
                                ₹<?php echo number_format($item_total, 0); ?>
                            </strong>

                        </div>


                        <form method="post"
                              class="tg-remove-form">

                            <button
                                type="submit"
                                name="remove"
                                value="<?php echo $index; ?>">
                                Remove
                            </button>

                        </form>

                    </div>

            <?php

                }

            ?>

                <div class="tg-continue">

                    <a href="menu.php">
                        ← Continue Shopping
                    </a>

                </div>

        </div>


        <!-- RIGHT SIDE ORDER SUMMARY -->

        <div class="tg-summary">

            <h2>Order Summary</h2>

            <div class="tg-summary-row">

                <span>Subtotal</span>

                <strong>
                    ₹<?php echo number_format($total, 0); ?>
                </strong>

            </div>


            <div class="tg-summary-row">

                <span>Delivery Fee</span>

                <strong>Free</strong>

            </div>


            <div class="tg-summary-line"></div>


            <div class="tg-summary-total">

                <span>Total</span>

                <strong>
                    ₹<?php echo number_format($total, 0); ?>
                </strong>

            </div>


            <a
                href="checkout.php"
                class="tg-checkout-btn">

                Proceed to Checkout

            </a>


            <form method="post"
                  class="tg-clear-form">

                <button
                    type="submit"
                    name="clear">

                    Clear Cart

                </button>

            </form>

        </div>


    <?php

            }

            else

            {

    ?>

            <div class="tg-empty-cart">

                <div class="tg-empty-icon">
                    🛒
                </div>

                <h2>Your cart is empty</h2>

                <p>
                    Add some delicious food to your cart.
                </p>

                <a href="menu.php">
                    Explore Menu
                </a>

            </div>

        </div>

    <?php

            }

    ?>

    </div>

</section>


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