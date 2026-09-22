<?php
include("../includes/db.php");

if(isset($_POST['add_category']))
{
    $name = $_POST['name'];

    $sql = "INSERT INTO categories (name)
            VALUES ('$name')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Category added successfully!');
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
    <title>Add Category</title>
</head>

<body>

<h2>Add New Category</h2>

<form method="post">

    <label>Category Name</label><br>

    <input type="text"
           name="name"
           placeholder="e.g. Pizza"
           required>

    <br><br>

    <button type="submit" name="add_category">
        Add Category
    </button>

</form>

</body>
</html>