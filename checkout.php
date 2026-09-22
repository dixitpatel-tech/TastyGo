<?php
session_start();

include("includes/db.php");

// Check Login
if(!isset($_SESSION['user_id']))
{
    echo "<script>
            alert('Please login first!');
            window.location='login.php';
          </script>";
    exit();
}

// Check Cart
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
{
    echo "<script>
            alert('Your cart is empty!');
            window.location='menu.php';
          </script>";
    exit();
}


// Place Order
if(isset($_POST['place_order']))
{
    $user_id = $_SESSION['user_id'];

    $customer_name = $_POST['customer_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $items = "";
    $total = 0;


    // Calculate items and total
    foreach($_SESSION['cart'] as $cart_item)
    {
        $quantity = $cart_item['quantity'];
        $price = $cart_item['price'];

        $items .= $cart_item['item'] . " x" . $quantity . ", ";

        $total = $total + ($price * $quantity);
    }


    // Insert Order
    $sql = "INSERT INTO orders
            (user_id, customer_name, mobile, address, items, total)
            VALUES
            ('$user_id', '$customer_name', '$mobile', '$address', '$items', '$total')";


    if(mysqli_query($conn, $sql))
    {
        // Empty Cart
        unset($_SESSION['cart']);

        echo "<script>
                alert('Order placed successfully!');
                window.location='my_orders.php';
              </script>";
        exit();
    }
    else
    {
        echo "Order Failed: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html>

<head>

    <title>Checkout - Food Ordering System</title>

    <link rel="stylesheet" href="css/style.css">

</head>


<body>


<header>

    <h2>Food Ordering System</h2>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php">Cart</a>

        <a href="my_orders.php">My Orders</a>

        <a href="logout.php">Logout</a>

    </nav>

</header>


<section class="category">

    <h2>Checkout</h2>


    <form method="post">


        <label>Customer Name</label>

        <br>

        <input type="text"
               name="customer_name"
               required>


        <br><br>


        <label>Mobile Number</label>

        <br>

        <input type="text"
               name="mobile"
               required>


        <br><br>


        <label>Address</label>

        <br>

        <textarea name="address"
                  required></textarea>


        <br><br>


        <button type="submit"
                name="place_order">

            Place Order

        </button>


    </form>


</section>


</body>

</html>