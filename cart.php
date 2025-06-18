<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    header("Location: view_cart.php");
    exit();
}
?>
