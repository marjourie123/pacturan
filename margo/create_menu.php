<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO menu_items (name, category, price, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $category, $price, $description]);
    header("Location: index.php");
}
?>

<form method="post">
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Category:</label>
    <select name="category">
        <option value="Appetizer">Appetizer</option>
        <option value="Main Course">Main Course</option>
        <option value="Dessert">Dessert</option>
        <option value="Beverage">Beverage</option>
    </select><br>
    <label>Price:</label><input type="text" name="price" required><br>
    <label>Description:</label><textarea name="description"></textarea><br>
    <button type="submit">Add Menu Item</button>
</form>
