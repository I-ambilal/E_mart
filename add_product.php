
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "mart_db");
    $name = $_POST['productname'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $conn->query("INSERT INTO products (productname, brand, price, image) VALUES ('$name', '$brand', '$price', '$image')");
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Add New Product</h1>
</header>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="productname" placeholder="Product Name" required>
        <input type="text" name="brand" placeholder="Brand" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="file" name="image" required>
        <button type="submit">Add Product</button>
    </form>
</div>
</body>
</html>
