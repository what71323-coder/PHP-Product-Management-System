<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("Location: /product-management/");
    exit;
}

include "../config/database.php";

if (!isset($_GET['id'])) {
    die("Product ID not found");
}

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Product not found");
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $image_name = $product['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = "../uploads/";
        $image_name = time() . "_" . basename($image);

        move_uploaded_file($tmp_name, $upload_dir . $image_name);
    }

    $sql = "UPDATE products SET
            name='$name',
            image='$image_name',
            category='$category',
            price='$price',
            quantity='$quantity',
            description='$description',
            status='$status'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: /product-management/");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/add-products.css">
</head>
<body>
<div class="add-container">
    <div class="add-box">
        <h2>Update Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Current Product Image:</label>
                <br>
                <img src="../uploads/<?php echo $product['image']; ?>" class="current-product-image" alt="Product Image" width="200" height="200">
            </div>
            <div class="form-group">
                <label>Change Product Image:</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" required>
                    <option value="Available" <?php if ($product['status'] == 'Available') echo 'selected'; ?>>Available</option>
                    <option value="Out of Stock" <?php if ($product['status'] == 'Out of Stock') echo 'selected'; ?>>Out of Stock</option>
                </select>
            </div>
            <button type="submit" name="update" class="add-submit-btn">Update Product</button>
        </form>
        <a href="../index.php" class="back-btn">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>