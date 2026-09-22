<?php
include("../includes/db.php");

// Total Orders
$order_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders");
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total'];

// Total Users
$user_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
 <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: #f5f5f5;
        color: #333;
    }

    header {
        background: #e23744;
        color: white;
        padding: 24px;
        text-align: center;
    }

    header h1 {
        margin: 0;
        font-size: 32px;
    }

    .dashboard {
        text-align: center;
        padding: 50px 30px;
    }

    .box {
        display: inline-block;
        vertical-align: top;
        width: 220px;
        min-height: 150px;
        margin: 15px;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        box-sizing: border-box;
    }

    .box h2 {
        color: #e23744;
        font-size: 28px;
        margin: 10px 0;
    }

    .box p {
        font-size: 15px;
        margin: 10px 0 22px;
    }

    .box a {
        display: inline-block;
        text-decoration: none;
        color: white;
        background: #e23744;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        transition: 0.2s;
    }

    .box a:hover {
        background: #c91f2d;
    }
 </style>
</head>

<body>

<header>
    <h1>Admin Dashboard</h1>
</header>

<div class="dashboard">

    <div class="box">
        <h2><?php echo $total_orders; ?></h2>
        <p>Total Orders</p>
        <a href="orders.php">View Orders</a>
    </div>

    <div class="box">
        <h2><?php echo $total_users; ?></h2>
        <p>Total Users</p>
        <a href="users.php">View Users</a>
    </div>

    <div class="box">
        <h2>Food</h2>
        <p>Manage Food</p>
        <a href="food.php">View Food</a>
    </div>

    <div class="box">
        <h2>Category</h2>
        <p>Manage Categories</p>
        <a href="category.php">View Categories</a>
    </div>

</div>

</body>
</html>