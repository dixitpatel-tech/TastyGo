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

$user_id = $_SESSION['user_id'];

// Fetch user's orders
$result = mysqli_query($conn,
    "SELECT * FROM orders
     WHERE user_id='$user_id'
     ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>

<head>

    <title>My Orders</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>

<body>

<header>

    <h1>Food Ordering System</h1>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php">Cart</a>

        <a href="my_orders.php">My Orders</a>

        <a href="logout.php">Logout</a>

    </nav>

</header>


<section class="category">

    <h2>My Orders</h2>


    <?php

    if(mysqli_num_rows($result) > 0)
    {
        while($order = mysqli_fetch_assoc($result))
        {
    ?>

        <div class="box">

            <h3>
                Order #<?php echo $order['id']; ?>
            </h3>


            <p>
                <strong>Items:</strong>
                <?php echo $order['items']; ?>
            </p>


            <p>
                <strong>Total:</strong>
                ₹<?php echo $order['total']; ?>
            </p>


            <p>
                <strong>Mobile:</strong>
                <?php echo $order['mobile']; ?>
            </p>


            <p>
                <strong>Address:</strong>
                <?php echo $order['address']; ?>
            </p>


            <p>
                <strong>Order Date:</strong>
                <?php echo $order['order_date']; ?>
            </p>


            <p>
                <strong>Status:</strong>
                <?php echo $order['status']; ?>
            </p>

        </div>

    <?php
        }
    }
    else
    {
        echo "<p>No orders found.</p>";
    }

    ?>

</section>


</body>

</html>