<?php
include 'db.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $conn->query("DELETE FROM delivery_info WHERE id = $delete_id");
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Refresh page without query string
    exit;
}

$result = $conn->query("SELECT * FROM delivery_info ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delivery Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: rgb(0, 0, 0);
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            max-width: 1200px;
            margin: auto;
        }

        .delete-btn {
            padding: 6px 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h2>Delivery Information Dashboard</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Building</th>
            <th>Colony</th>
            <th>Province</th>
            <th>City</th>
            <th>Area</th>
            <th>Address</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['building']) ?></td>
            <td><?= htmlspecialchars($row['colony']) ?></td>
            <td><?= htmlspecialchars($row['province']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td><?= htmlspecialchars($row['area']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
