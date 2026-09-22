<?php
include("../includes/db.php");

// Update Order Status
if(isset($_POST['update_status']))
{
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders
            SET status='$status'
            WHERE id='$order_id'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Order status updated successfully!');
                window.location='orders.php';
              </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Orders - Food Ordering System</title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<header>

    <h1>Food Ordering System - Admin</h1>

    <nav>

        <a href="dashboard.php">Dashboard</a>

        <a href="orders.php">Orders</a>

        <a href="food.php">Food</a>

        <a href="category.php">Categories</a>

    </nav>

</header>


<section class="category">

    <h2>Manage Orders</h2>


    <?php

    $sql = "SELECT * FROM orders ORDER BY id DESC";

    $result = mysqli_query($conn, $sql);


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
                <b>Name:</b>
                <?php echo $order['customer_name']; ?>
            </p>


            <p>
                <b>Mobile:</b>
                <?php echo $order['mobile']; ?>
            </p>


            <p>
                <b>Address:</b>
                <?php echo $order['address']; ?>
            </p>


            <p>
                <b>Items:</b>
                <?php echo $order['items']; ?>
            </p>


            <p>
                <b>Total:</b>
                ₹<?php echo $order['total']; ?>
            </p>


            <p>
                <b>Date:</b>
                <?php echo $order['order_date']; ?>
            </p>


            <p>
                <b>Current Status:</b>
                <?php echo $order['status']; ?>
            </p>


            <!-- Status Update Form -->

            <form method="post">

                <input type="hidden"
                       name="order_id"
                       value="<?php echo $order['id']; ?>">


                <select name="status">

                    <option value="Pending"
                        <?php
                        if($order['status'] == 'Pending')
                        {
                            echo 'selected';
                        }
                        ?>>
                        Pending
                    </option>


                    <option value="Confirmed"
                        <?php
                        if($order['status'] == 'Confirmed')
                        {
                            echo 'selected';
                        }
                        ?>>
                        Confirmed
                    </option>


                    <option value="Preparing"
                        <?php
                        if($order['status'] == 'Preparing')
                        {
                            echo 'selected';
                        }
                        ?>>
                        Preparing
                    </option>


                    <option value="Out for Delivery"
                        <?php
                        if($order['status'] == 'Out for Delivery')
                        {
                            echo 'selected';
                        }
                        ?>>
                        Out for Delivery
                    </option>


                    <option value="Delivered"
                        <?php
                        if($order['status'] == 'Delivered')
                        {
                            echo 'selected';
                        }
                        ?>>
                        Delivered
                    </option>

                </select>


                <br><br>


                <button type="submit"
                        name="update_status">

                    Update Status

                </button>

            </form>

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