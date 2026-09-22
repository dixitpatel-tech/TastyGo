<?php
include("../includes/db.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM categories WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Category deleted successfully!');
                window.location='category.php';
              </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
else
{
    header("Location: category.php");
    exit();
}
?>s