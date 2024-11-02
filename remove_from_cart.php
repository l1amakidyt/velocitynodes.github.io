<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['cart'][$index])) {
        // Remove item from the cart
        array_splice($_SESSION['cart'], $index, 1);
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
