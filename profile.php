<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user'];
$result = $conn->query("SELECT * FROM users WHERE username='$username'");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $conn->real_escape_string($_POST['username']);
    $new_email = $conn->real_escape_string($_POST['email']);

    // Optional password update
    if (!empty($_POST['password'])) {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET username='$new_username', email='$new_email', phone='$phone', address='$address', password='$new_password' WHERE id={$user['id']}");
    } else {
        $conn->query("UPDATE users SET username='$new_username', email='$new_email', phone='$phone', address='$address' WHERE id={$user['id']}");
    }

    $_SESSION['user'] = $new_username;
    header("Location: profile.php?updated=1");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="form-container">
    <h2>Your Profile</h2>
    <?php if (isset($_GET['updated'])): ?>
        <p style="color: green;">Profile updated successfully!</p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <input type="password" name="password" placeholder="New Password (optional)">
        <button type="submit">Update Profile</button>
        <a href="index.php" class="logout">Back to Home</a>
    </form>
                   <a href="logout.php">Logout</a>

</div>
</body>
</html>
