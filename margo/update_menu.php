<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM menu_items WHERE id = ?");
$stmt->execute([$id]);
$menu_item = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE menu_items SET name = ?, category = ?, price = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $category, $price, $description, $id]);
    header("Location: index.php");
}
?>

<form method="post">
    <label>Name:</label><input type="text" name="name" value="<?= htmlspecialchars($menu_item['name']) ?>"><br>
    <label>Category:</label>
    <select name="category">
        <option value="Appetizer" <?= $menu_item['category'] == 'Appetizer' ? 'selected' : '' ?>>Appetizer</option>
        <option value="Main Course" <?= $menu_item['category'] == 'Main Course' ? 'selected' : '' ?>>Main Course</option>
        <option value="Dessert" <?= $menu_item['category'] == 'Dessert' ? 'selected' : '' ?>>Dessert</option>
        <option value="Beverage" <?= $menu_item['category'] == 'Beverage' ? 'selected' : '' ?>>Beverage</option>
    </select><br>
    <label>Price:</label><input type="text" name="price" value="<?= htmlspecialchars($menu_item['price']) ?>"><br>
    <label>Description:</label><textarea name="description"><?= htmlspecialchars($menu_item['description']) ?></textarea><br>
    <button type="submit">Update Menu Item</button>
</form>
