<?php
include("../includes/db.php");

// Fetch Food
$result = mysqli_query($conn, "SELECT * FROM food ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Food</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f4f4f4;
        }

        header {
            background: #e23744;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #e23744;
            color: white;
        }

        .add {
            display: inline-block;
            background: #e23744;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .edit {
            background: #2196F3;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background: #f44336;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<header>
    <h1>Manage Food</h1>
</header>

<div class="container">

    <a href="add_food.php" class="add">Add Food</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        <?php

        if(mysqli_num_rows($result) > 0)
        {
            while($food = mysqli_fetch_assoc($result))
            {
                echo "<tr>";

                echo "<td>" . $food['id'] . "</td>";
                echo "<td>" . $food['name'] . "</td>";
                echo "<td>₹" . $food['price'] . "</td>";
                echo "<td>" . $food['image'] . "</td>";
                echo "<td>" . $food['description'] . "</td>";

                echo "<td>
                        <a class='edit' href='edit_food.php?id=" . $food['id'] . "'>Edit</a>
                        <a class='delete' href='delete_food.php?id=" . $food['id'] . "' 
                           onclick=\"return confirm('Are you sure you want to delete this food?');\">
                           Delete
                        </a>
                      </td>";

                echo "</tr>";
            }
        }
        else
        {
            echo "<tr>";
            echo "<td colspan='6'>No Food Found</td>";
            echo "</tr>";
        }

        ?>

    </table>

</div>

</body>
</html>