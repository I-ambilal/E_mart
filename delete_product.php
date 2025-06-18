<?php
$conn = new mysqli("localhost", "root", "", "mart_db");
$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");
header("Location: admin.php");
