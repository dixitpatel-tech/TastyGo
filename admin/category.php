<?php
include("../includes/db.php");

// Fetch Categories
$result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>

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
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
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
    <h1>Manage Categories</h1>
</header>

<div class="container">

    <a href="add_category.php" class="add">Add Category</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>

        <?php

        if(mysqli_num_rows($result) > 0)
        {
            while($category = mysqli_fetch_assoc($result))
            {
                echo "<tr>";

                echo "<td>" . $category['id'] . "</td>";
                echo "<td>" . $category['name'] . "</td>";

                echo "<td>
                        <a class='edit' href='edit_category.php?id=" . $category['id'] . "'>Edit</a>

                        <a class='delete' href='delete_category.php?id=" . $category['id'] . "'
                           onclick=\"return confirm('Are you sure you want to delete this category?');\">
                           Delete
                        </a>
                      </td>";

                echo "</tr>";
            }
        }
        else
        {
            echo "<tr>";
            echo "<td colspan='3'>No Category Found</td>";
            echo "</tr>";
        }

        ?>

    </table>

</div>

</body>
</html>