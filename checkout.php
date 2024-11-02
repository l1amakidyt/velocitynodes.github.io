<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Velocity Nodes</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AQ_GTkKD0IT6KvldFZ6D-g006wXFBL8o9FH9SSrPi48j89Dul1K7fYRvReqqVnCNvyRjcov-mlKVMZp8&currency=USD"></script>
</head>
<body class="checkout-page">
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <a href="index.php"><h1>Velocity Nodes</h1></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="pricing.php">Pricing</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php" class="nav-btn">Login</a></li>
                <li><a href="register.php" class="nav-btn">Register</a></li>
            <?php else: ?>
                <li><a href="account.php" class="nav-btn">Account</a></li>
                <li><a href="logout.php" class="nav-btn">Logout</a></li>
            <?php endif; ?>
            <li>
                <a href="userbasket.php">
                    <img src="images/cart-icon.png" alt="Basket" class="cart-icon">
                    <span class="cart-count">0</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="checkout-container">
        <h2>Checkout</h2>
        <table class="checkout-summary">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="checkout-items">
                <!-- Checkout items populated by JS -->
            </tbody>
        </table>
        <h3 id="checkout-total">Total: $0.00</h3>

        <!-- PayPal Button Container -->
        <div id="paypal-button-container" class="paypal-button"></div>
    </div>

    <script src="scripts.js"></script> <!-- JS for cart functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            loadCheckout(); // Automatically load checkout items on page load
        });

        paypal.Buttons({
            createOrder: function(data, actions) {
                let total = loadCheckout(); // Get total price
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: total // Use total from the basket
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    localStorage.removeItem('userbasket');
                    window.location.href = "thank_you.php"; // Redirect to a thank you page
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
