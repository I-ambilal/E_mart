<?php
session_start();
$product_id = $_POST['product_id'] ?? null;

if ($product_id !== null) {
    // Connect to DB
    $conn = new mysqli("localhost", "root", "", "mart_db");

    // Fetch product info
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($product = $result->fetch_assoc()) {
        // Init cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add to cart or update quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['productname'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
}

// Redirect back to the main page
header("Location: index.php");  // Change to your actual file if it's named differently
exit;
