<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}

include "../config/database.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Image upload
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_dir = "../uploads/";
    $image_name = time() . "_" . basename($image);

    move_uploaded_file($tmp_name, $upload_dir . $image_name);

    $sql = "INSERT INTO products
            (name, image, category, price, quantity, description, status, createdAt)
            VALUES
            ('$name', '$image_name', '$category', '$price', '$quantity', '$description', '$status', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/add-products.css">
</head>
<body>
<div class="add-container">
    <div class="add-box">
        <h2>Add New Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" name="name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label>Product Image:</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category" required>
                    <option value="">Select Category</option>
                    <option value="Men Clothes">Men Clothes</option>
                    <option value="Women Clothes">Women Clothes</option>
                    <option value="Watches">Watches</option>
                    <option value="Groceries">Groceries</option>
                </select>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" name="quantity" placeholder="Enter quantity" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" placeholder="Enter product description" required></textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" required>
                    <option value="">Select Status</option>
                    <option value="Available">Available</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
            </div>
            <button type="submit" name="add" class="add-submit-btn">Add Product</button>
        </form>
        <a href="../index.php" class="back-btn">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>