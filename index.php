<?php
$conn = new mysqli("localhost", "root", "", "mart_db");
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Electronic Mart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #0B0909;
      color: #fff;
      margin: 0;
      padding: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      background-color: #090009;
      align-items: center;
      margin-bottom: 25px;
      color: #fff;
      position: relative;
    }

    header h1 {
      margin-left: 20px;
      font-size: 24px;
    }

    nav {
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    nav a {
      margin-left: 24px;
      text-decoration: none;
      color: white;
      font-size: 14px;
    }

    .logo {
      margin-top: 20px;
      margin-left: 20px;
    }

    .logo img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: contain;
    }

    .hero-banner {
      position: relative;
      width: 100%;
      height: 500px;
      overflow: hidden;
      margin-bottom: 40px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
    }

    .hero-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.6);
    }

    .hero-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color:rgb(95, 96, 102);
    }

    .hero-content h1 {
      font-size: 60px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .hero-content p {
      font-size: 28px;
    }

    .products-section {
      padding: 60px;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .product-card {
      background-color: #0B0909;
      color: white;
      width: 300px;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(50, 58, 94, 0.29);
      transition: 0.3s;
    }

    .product-card:hover {
      border-color: white;
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    .product-card button {
      margin-top: 10px;
      padding: 10px;
      width: 100%;
      color:rgb(54, 55, 59);
      color: black;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .product-card button:hover {
      background-color:rgba(0, 140, 255, 0);
      color: white;
    }
  </style>
</head>

<body>

<header>
  <div class="logo">
    <img src="Logo.png" alt="Site Logo" />
  </div>
  <h1>Electronic Mart</h1>
  <nav>
    <a href="index.php">Home</a>
    <a href="admin.php">Admin</a>
    <a href="profile.php">Profile</a>
    <a href="login.php">Login</a>
    <a href="view_cart.php">🛒 View Cart</a>
  </nav>
</header>

<div class="hero-banner">
  <img src="bg.jpg" alt="Hero Banner" />
  <div class="hero-content">
  <h1>Explore the Future of Technology</h1>
<p>Cutting-edge gadgets and electronics for the smart generation.</p>

  </div>
</div>

<section id="products" class="products-section">
  <div class="products-grid">
    <?php while ($row = $result->fetch_assoc()): ?>
      <form method="POST" action="add_to_cart.php" class="product-card">
        <img src="uploads/<?php echo $row['image']; ?>" alt="Product Image" />
        <p><?php echo $row['productname']; ?></p>
        <p>Brand: <?php echo $row['brand']; ?></p>
        <p>Price: $<?php echo $row['price']; ?></p>
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $row['productname']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
        <button type="submit">Add to Cart</button>
      </form>
    <?php endwhile; ?>
  </div>
</section>

</body>
</html>
