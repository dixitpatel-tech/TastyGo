<?php
session_start();

include("includes/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        $_SESSION['user_email'] = $user['email'];

        echo "<script>
                alert('Login Successful');
                window.location='index.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Invalid Email or Password');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="tg-login-page">


<header class="tg-auth-header">

    <div class="tg-auth-logo">
        TastyGo
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php">🛒 Cart</a>

        <a href="register.php">Register</a>

    </nav>

</header>


<main class="tg-auth-main">

    <div class="tg-auth-card">

        <div class="tg-auth-icon">
            👤
        </div>

        <h1>Welcome Back!</h1>

        <p class="tg-auth-subtitle">
            Login to continue ordering delicious food
        </p>


        <form method="post" class="tg-auth-form">

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >


            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >


            <button
                type="submit"
                name="login"
                class="tg-auth-btn">

                Login

            </button>

        </form>


        <div class="tg-auth-bottom">

            <span>Don't have an account?</span>

            <a href="register.php">
                Create Account
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