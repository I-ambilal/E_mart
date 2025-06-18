<?php
$conn = new mysqli("localhost", "root", "", "autojin");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $product = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['productname'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    
    // Image upload logic
    $image = $product['image']; // default
    if ($_FILES['image']['name']) {
        $image = "uploads/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $conn->query("UPDATE products SET productname='$name', brand='$brand', price='$price', image='$image' WHERE id = $id");
    header("Location: admin_dashboard.php"); // redirect after update
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3E3E2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .edit-form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 400px;
            color: #1B2E3C;
        }

        .edit-form h2 {
            text-align: center;
            color: #dc2626;
            margin-bottom: 20px;
        }

        .edit-form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        .edit-form input[type="text"],
        .edit-form input[type="number"],
        .edit-form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .edit-form input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #1B2E3C;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #dc2626;
        }

        .edit-form img {
            margin-top: 10px;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="edit-form">
    <h2>Edit Product</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Product Name</label>
        <input type="text" name="productname" value="<?= htmlspecialchars($product['productname']) ?>" required>

        <label>Brand</label>
        <input type="text" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" required>

        <label>Price</label>
        <input type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>

        <label>Image</label><br>
        <img src="<?= $product['image'] ?>" alt="Current Image"><br>
        <input type="file" name="image">

        <input type="submit" value="Update Product">
    </form>
</div>

</body>
</html>
