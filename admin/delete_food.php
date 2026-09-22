<?php
include("../includes/db.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM food WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Food deleted successfully!');
                window.location='food.php';
              </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
else
{
    header("Location: food.php");
    exit();
}
?>