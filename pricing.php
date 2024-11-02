<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velocity Nodes - Pricing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="pricing">
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

            <!-- Cart Icon -->
            <li>
                <a href="userbasket.php">
                    <img src="images/cart-icon.png" alt="Basket" class="cart-icon">
                    <span class="cart-count">0</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Pricing Section -->
    <h2>Packages</h2>
    <div class="pricing-options">
        <!-- Stone Package -->
        <div class="plan">
            <h3>Stone Package</h3>
            <p>$2/month</p>
            <p>2GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Iron Package -->
        <div class="plan">
            <h3>Iron Package</h3>
            <p>$3/month</p>
            <p>3GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Gold Package -->
        <div class="plan">
            <h3>Gold Package</h3>
            <p>$4/month</p>
            <p>4GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Diamond Package -->
        <div class="plan">
            <h3>Diamond Package</h3>
            <p>$5/month</p>
            <p>5GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Emerald Package -->
        <div class="plan">
            <h3>Emerald Package</h3>
            <p>$6/month</p>
            <p>6GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Obsidian Package -->
        <div class="plan">
            <h3>Obsidian Package</h3>
            <p>$7/month</p>
            <p>7GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Netherite Package -->
        <div class="plan">
            <h3>Netherite Package</h3>
            <p>$8/month</p>
            <p>8GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Ender Package -->
        <div class="plan">
            <h3>Ender Package</h3>
            <p>$9/month</p>
            <p>9GB RAM</p>
            <button>Add to Basket</button>
        </div>

        <!-- Dragon Package -->
        <div class="plan">
            <h3>Dragon Package</h3>
            <p>$10/month</p>
            <p>10GB RAM</p>
            <button>Add to Basket</button>
        </div>
    </div>

    <script src="scripts.js"></script> <!-- JS for cart functionality -->
</body>
</html>
