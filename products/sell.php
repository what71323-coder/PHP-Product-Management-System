
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}

include "../config/database.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Product not found";
    exit;
}

$product = mysqli_fetch_assoc($result);
$error = "";

if (isset($_POST['sell'])) {
    $sell_quantity = (int) $_POST['quantity'];

    if ($sell_quantity <= 0) {
        $error = "Enter a valid quantity.";
    } elseif ($sell_quantity > $product['quantity']) {
        $error = "Not enough stock available.";
    } else {
        $sql = "UPDATE products SET quantity = quantity - $sell_quantity
                WHERE id = $id AND quantity >= $sell_quantity";

        if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) == 1) {
            header("Location: ../index.php");
            exit;
        } else {
            $error = "Product could not be sold.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>

    <link rel="stylesheet" href="../css/sell.css">
</head>
<body>

<div class="sell-container">

    <h2>Sell Product</h2>

    <h3><?php echo htmlspecialchars($product['name']); ?></h3>

    <div class="product-info">
        <p>Price: ₹<?php echo htmlspecialchars($product['price']); ?></p>

        <p>Available Stock:
            <?php echo htmlspecialchars($product['quantity']); ?>
        </p>
    </div>

    <?php if ($error != "") { ?>
        <p class="error-message">
            <?php echo $error; ?>
        </p>
    <?php } ?>

    <form method="POST">
        <label>Enter Selling Quantity:</label>

        <input type="number" name="quantity"
               min="1"
               max="<?php echo (int) $product['quantity']; ?>"
               step="1"
               required>

        <button type="submit" name="sell">Confirm Sell</button>
    </form>

    <a href="../index.php" class="back-btn">Back to Dashboard</a>

</div>

</body>
</html>
