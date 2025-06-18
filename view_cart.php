<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;

// Handle remove
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $remove_id = $_POST['remove'];
        unset($_SESSION['cart'][$remove_id]);
        header("Location: view_cart.php");
        exit;
    }

    if (isset($_POST['clear_cart'])) {
        $_SESSION['cart'] = [];
        header("Location: view_cart.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
  background-color: #0d0d0d;
            color: #333;
            height: 98vh;
            display: flex;
            justify-content: center;    
            align-items: center;
        }
        .cart-container {
            width: 80%;
            height: 70%;
            margin: auto;
            background: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        span{
            text-align: start;
            width: auto;
            color:rgb(255, 255, 255);
            background-color:rgb(0, 0, 0);
            padding: 10px;
            border-radius: 5px;
            font-size: 24px;
            font-weight: bold;
        }
        p{
            color:white;
                        padding: 10px;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            color:rgb(255, 255, 255);
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total {
            text-align: right;
            font-weight: bold;
            font-size: 18px;
            
            
            color:rgb(255, 255, 255);
            margin-top: 20px;
        }
        .btn, .remove-btn {
            display: inline-block;
            margin-top: 10px;
            background-color:rgb(255, 255, 255);
            color: black;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .remove-btn {
            background-color:rgb(255, 255, 255);
        }
        .btn:hover {
            background-color:rgb(255, 255, 255);
        }
        .remove-btn:hover {
            background-color:rgb(255, 255, 255);
        }
        .action-buttons {
            bottom: 0;
         
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div class="cart-container">
    <span>Your Cart</span>

    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
                        <a class="btn" href="index.php">Continue Shopping</a>

    <?php else: ?>
        <form method="POST">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($cart as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>$<?= number_format($subtotal, 2) ?></td>
                        <td>
                            <button class="remove-btn" type="submit" name="remove" value="<?= $id ?>">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p class="total">Total: $<?= number_format($total, 2) ?></p>
            <div class="action-buttons">
                <a class="btn" href="index.php">Continue Shopping</a>
                 <a class="btn" href="delivery_form.php">PROCEED ORDER</a>
                <button class="btn" type="submit" name="clear_cart">Clear Cart</button>
           
        </form>
        
    <?php endif; ?>
    
</div>
</body>
</html>
