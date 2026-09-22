<!DOCTYPE html>
<html>

<head>

    <title>Contact - TastyGo</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="tg-contact-page">

<header class="tg-auth-header">

    <div class="tg-auth-logo">
        TastyGo
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="menu.php">Menu</a>

        <a href="cart.php">🛒 Cart</a>

        <a href="login.php">Login</a>

        <a href="register.php">Register</a>

        <a href="contact.php" class="tg-active-nav">
            Contact
        </a>

    </nav>

</header>


<main class="tg-contact-main">

    <section class="tg-contact-heading">

        <h1>Contact Us</h1>

        <p>
            Have a question or need help?
            We are happy to hear from you.
        </p>

    </section>


    <section class="tg-contact-container">


        <!-- CONTACT INFORMATION -->

        <div class="tg-contact-info">

            <h2>Get In Touch</h2>

            <p class="tg-contact-text">
                Contact TastyGo for any questions,
                feedback or support.
            </p>


            <div class="tg-contact-item">

                <div class="tg-contact-icon">
                    📍
                </div>

                <div>
                    <h3>Address</h3>
                    <p>Gandhinagar, Gujarat, India</p>
                </div>

            </div>


            <div class="tg-contact-item">

                <div class="tg-contact-icon">
                    📞
                </div>

                <div>
                    <h3>Phone</h3>
                    <p>+91 98765 43210</p>
                </div>

            </div>


            <div class="tg-contact-item">

                <div class="tg-contact-icon">
                    📧
                </div>

                <div>
                    <h3>Email</h3>
                    <p>support@tastygo.com</p>
                </div>

            </div>

        </div>


        <!-- CONTACT FORM -->

        <div class="tg-contact-card">

            <h2>Send Us a Message</h2>

            <form class="tg-contact-form"
                  onsubmit="return false;">

                <label>Name</label>

                <input
                    type="text"
                    placeholder="Enter your name"
                    required
                >


                <label>Email</label>

                <input
                    type="email"
                    placeholder="Enter your email"
                    required
                >


                <label>Message</label>

                <textarea
                    placeholder="Write your message..."
                    rows="5"
                    required
                ></textarea>


                <button type="submit">
                    Send Message
                </button>

            </form>

        </div>

    </section>

</main>


<!-- FOOTER -->

<footer class="tg-footer">

    <div class="tg-footer-top">

        <div class="tg-footer-brand">

            <h2>TastyGo</h2>

            <p>
                Delicious food delivered to your doorstep.
            </p>

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