<?php
include("../includes/db.php");

if(isset($_POST['add_food']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO food (name, price, image, description)
            VALUES ('$name', '$price', '$image', '$description')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Food added successfully!');
                window.location='food.php';
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
    <title>Add Food</title>
</head>

<body>

<h2>Add New Food</h2>

<form method="post">

    <label>Food Name</label><br>
    <input type="text" name="name" required>
    <br><br>

    <label>Price</label><br>
    <input type="number" name="price" required>
    <br><br>

    <label>Image Name</label><br>
    <input type="text" name="image" placeholder="pizza.jpg">
    <br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea>
    <br><br>

    <button type="submit" name="add_food">
        Add Food
    </button>

</form>

</body>
</html>