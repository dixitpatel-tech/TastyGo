<?php
include("includes/db.php");

if(isset($_POST['register']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO users(fullname,email,password,mobile)
            VALUES('$fullname','$email','$password','$mobile')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('Registration Successful');
                window.location='login.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Registration Failed');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Register - TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="tg-register-page">


<header class="tg-auth-header">

    <div class="tg-auth-logo">
        TastyGo
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php">🛒 Cart</a>

        <a href="login.php">Login</a>

        <a href="register.php" class="tg-active-nav">
            Register
        </a>

    </nav>

</header>


<main class="tg-auth-main">

    <div class="tg-auth-card">

        <div class="tg-auth-icon">
            👤
        </div>

        <h1>Create Account</h1>

        <p class="tg-auth-subtitle">
            Join TastyGo and start ordering delicious food
        </p>


        <form method="post"
              action="register.php"
              class="tg-auth-form">


            <label>Full Name</label>

            <input
                type="text"
                name="fullname"
                placeholder="Enter your full name"
                required
            >


            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >


            <label>Mobile Number</label>

            <input
                type="text"
                name="mobile"
                placeholder="Enter your mobile number"
                required
            >


            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Create a password"
                required
            >


            <button
                type="submit"
                name="register"
                class="tg-auth-btn">

                Create Account

            </button>

        </form>


        <div class="tg-auth-bottom">

            <span>Already have an account?</span>

            <a href="login.php">
                Login
            </a>

        </div>

    </div>

</main>


<footer class="tg-footer">

    <div class="tg-footer-top">

        <div class="tg-footer-brand">
            <h2>TastyGo</h2>
            <p>Delicious food delivered to your doorstep.</p>
        </div>

        <div class="tg-footer-column">
            <h3>About TastyGo</h3>
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="tg-footer-column">
            <h3>For You</h3>
            <a href="cart.php">Your Cart</a>
            <a href="my_orders.php">My Orders</a>
            <a href="login.php">Login</a>
        </div>

        <div class="tg-footer-column">
            <h3>Connect With Us</h3>
            <p>📧 support@tastygo.com</p>
            <p>📞 +91 98765 43210</p>
            <p>📍 Gandhinagar, Gujarat</p>
        </div>

    </div>

    <div class="tg-footer-bottom">
        <p>© 2026 TastyGo. All Rights Reserved.</p>
        <p>Made with ❤️ for food lovers</p>
    </div>

</footer>

</body>

</html>