<?php
include("../includes/db.php");

if(!isset($_GET['id']))
{
    header("Location: category.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$category = mysqli_fetch_assoc($result);

if(!$category)
{
    echo "Category not found";
    exit();
}

if(isset($_POST['update_category']))
{
    $name = $_POST['name'];

    $sql = "UPDATE categories SET name='$name' WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Category updated successfully!');
                window.location='category.php';
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
    <title>Edit Category</title>
</head>

<body>

<h2>Edit Category</h2>

<form method="post">

    <label>Category Name</label><br>

    <input type="text"
           name="name"
           value="<?php echo $category['name']; ?>"
           required>

    <br><br>

    <button type="submit" name="update_category">
        Update Category
    </button>

</form>

</body>
</html>