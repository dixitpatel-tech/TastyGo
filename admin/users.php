<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");

if(!$result)
{
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Users - TastyGo</title>

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
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            background: #e23744;
            padding: 10px 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }
    </style>
</head>

<body>

<header>
    <h1>TastyGo - Users</h1>
</header>

<div class="container">

    <a href="dashboard.php" class="back">
        ← Back to Dashboard
    </a>

    <h2>Registered Users</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>

        <?php
        while($user = mysqli_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo htmlspecialchars($user['fullname']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['mobile']); ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>

</html>