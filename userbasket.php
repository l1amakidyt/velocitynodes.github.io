<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket - Velocity Nodes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="cart">
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

    <div class="cart-container">
        <h2>Your Basket</h2>
        <table>
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="basket-items">
                <!-- Basket items will be generated dynamically by JavaScript -->
            </tbody>
        </table>
        <h3 id="basket-total">Total: $0.00</h3>
        <button id="checkout-button">Proceed to Checkout</button>
    </div>

    <script src="scripts.js"></script> <!-- JS for basket functionality -->
    <script>
        // Load basket items from localStorage and display them
        function loadBasket() {
            let userbasket = JSON.parse(localStorage.getItem('userbasket')) || [];
            const basketItemsContainer = document.getElementById('basket-items');
            basketItemsContainer.innerHTML = ''; // Clear any existing items

            let total = 0;
            userbasket.forEach(item => {
                const itemTotal = parseFloat(item.price.replace('$', '')) * item.quantity;
                total += itemTotal;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.plan}</td>
                    <td>${item.price}</td>
                    <td>${item.quantity}</td>
                    <td>$${itemTotal.toFixed(2)}</td>
                    <td><button onclick="decreaseQuantity('${item.plan}')">-</button></td>
                `;
                basketItemsContainer.appendChild(row);
            });

            document.getElementById('basket-total').textContent = `Total: $${total.toFixed(2)}`;
        }

        // Function to decrease item quantity in the basket
        function decreaseQuantity(plan) {
            let userbasket = JSON.parse(localStorage.getItem('userbasket')) || [];
            const item = userbasket.find(item => item.plan === plan);

            if (item) {
                item.quantity -= 1; // Decrease quantity by one
                if (item.quantity === 0) {
                    userbasket = userbasket.filter(i => i.plan !== plan); // Remove item if quantity reaches 0
                }
            }

            localStorage.setItem('userbasket', JSON.stringify(userbasket));
            loadBasket();
            updateBasketCount(); // Update count in the navbar
        }

        // Redirect to checkout page on button click
        document.getElementById('checkout-button').addEventListener('click', () => {
            window.location.href = 'checkout.php';
        });

        // Load basket on page load
        loadBasket();
    </script>
</body>
</html>
