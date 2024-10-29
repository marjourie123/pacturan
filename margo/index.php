<?php
include 'db.php'; // Include the database connection

try {
    $stmt = $pdo->query("SELECT * FROM menu_items ORDER BY category");
    $menu_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Restaurant Menu</h1>
    <a href="create_menu.php">Add New Menu Item</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($menu_items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['category']) ?></td>
            <td><?= htmlspecialchars($item['price']) ?></td>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td>
                <a href="update_menu.php?id=<?= $item['id'] ?>">Edit</a>
                <a href="delete_menu.php?id=<?= $item['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

