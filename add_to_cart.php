<?php
session_start();

// Sample item data, replace with actual item details
$plans = [
    1 => ['name' => 'Stone Package', 'price' => 2],
    2 => ['name' => 'Iron Package', 'price' => 3],
    3 => ['name' => 'Gold Package', 'price' => 4],
    4 => ['name' => 'Diamond Package', 'price' => 5],
    5 => ['name' => 'Emerald Package', 'price' => 6],
    6 => ['name' => 'Obsidian Package', 'price' => 7],
    7 => ['name' => 'Netherite Package', 'price' => 8],
    8 => ['name' => 'Ender Package', 'price' => 9],
    9 => ['name' => 'Dragon Package', 'price' => 10]
];

// Get item ID from POST
$itemId = intval($_POST['planId']);
if (isset($plans[$itemId])) {
    $item = $plans[$itemId];

    // Initialize session basket if empty
    if (!isset($_SESSION['basketItems'])) {
        $_SESSION['basketItems'] = [];
    }

    // Add item to basket
    $_SESSION['basketItems'][] = [
        'name' => $item['name'],
        'price' => $item['price'],
        'quantity' => 1
    ];
    
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
