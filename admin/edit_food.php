<?php
include("../includes/db.php");

if(!isset($_GET['id']))
{
    header("Location: food.php");
    exit();
}

$id = $_GET['id'];

// Fetch food
$result = mysqli_query($conn, "SELECT * FROM food WHERE id=$id");
$food = mysqli_fetch_assoc($result);

if(!$food)
{
    echo "Food not found";
    exit();
}

// Update food
if(isset($_POST['update_food']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $sql = "UPDATE food SET
            name='$name',
            price='$price',
            image='$image',
            description='$description'
            WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Food updated successfully!');
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
    <title>Edit Food</title>
</head>

<body>

<h2>Edit Food</h2>

<form method="post">

    <label>Food Name</label><br>
    <input type="text" name="name"
           value="<?php echo $food['name']; ?>" required>

    <br><br>

    <label>Price</label><br>
    <input type="number" name="price"
           value="<?php echo $food['price']; ?>" required>

    <br><br>

    <label>Image Name</label><br>
    <input type="text" name="image"
           value="<?php echo $food['image']; ?>">

    <br><br>

    <label>Description</label><br>
    <textarea name="description"><?php echo $food['description']; ?></textarea>

    <br><br>

    <button type="submit" name="update_food">
        Update Food
    </button>

</form>

</body>
</html>