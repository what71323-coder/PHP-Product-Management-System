<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}

include "config/database.php";

$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$category = "";

if (isset($_GET['category'])) {
    $category = $_GET['category'];
}

$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

if ($category == "men") {
    $sql = "SELECT * FROM products WHERE category = 'Men Clothes' AND name LIKE '%$search%'";
} elseif ($category == "women") {
    $sql = "SELECT * FROM products WHERE category = 'Women Clothes' AND name LIKE '%$search%'";
} elseif ($category == "watch") {
    $sql = "SELECT * FROM products WHERE category = 'Watches' AND name LIKE '%$search%'";
} elseif ($category == "groceries") {
    $sql = "SELECT * FROM products WHERE category = 'Groceries' AND name LIKE '%$search%'";
}

$sql .= " ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="dashboard-header">
    <h2>Product Management</h2>

    <div>
        <a href="homepage.php" class="home-btn">Home</a>
        <a href="/product-management/auth/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<div class="dashboard-container">

    <div class="welcome-box">
        <div>
            <h1>Welcome to Dashboard</h1>
            <p>Manage your products easily from here.</p>
        </div>

        <div class="welcome-actions">
            <form method="GET" action="index.php" class="dashboard-search">

                <input type="text" name="search"
                    placeholder="Search product..."
                    value="<?php echo htmlspecialchars($search); ?>"
                    required>

                <input type="hidden" name="category"
                    value="<?php echo htmlspecialchars($category); ?>">

                <button type="submit">Search</button>
            </form>

            <a href="products/add.php" class="add-btn">
                + Add New Product
            </a>
        </div>
    </div>

    <!-- Category Section -->

    <h2 class="category-heading">Shop by Category</h2>

    <div class="category-grid">

        <a href="index.php?category=men" class="category-card men-card">
            <span class="category-icon">👔</span>
            Men Clothes
        </a>

        <a href="index.php?category=women" class="category-card women-card">
            <span class="category-icon">👗</span>
            Women Clothes
        </a>

        <a href="index.php?category=watch" class="category-card watch-card">
            <span class="category-icon">⌚</span>
            Watches
        </a>

        <a href="index.php?category=groceries" class="category-card grocery-card">
            <span class="category-icon">🛒</span>
            Groceries
        </a>

    </div>

    <div class="all-products">
        <a href="index.php" class="all-products-btn">All Products</a>
    </div>

    <!-- Products -->

    <div class="product-grid">

        <?php if ($result && mysqli_num_rows($result) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="product-card">

                    <div class="product-image">

                        <?php if (!empty($row['image'])) { ?>

                            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                                alt="<?php echo htmlspecialchars($row['name']); ?>">

                        <?php } else { ?>

                            <div class="no-image">No Image</div>

                        <?php } ?>

                    </div>

                    <div class="product-details">

                        <h3>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </h3>

                        <p class="category">
                            <?php echo htmlspecialchars($row['category']); ?>
                        </p>

                        <p class="description">
                            <?php echo htmlspecialchars($row['description']); ?>
                        </p>

                        <div class="price">
                            ₹<?php echo htmlspecialchars($row['price']); ?>
                        </div>

                        <p class="quantity">
                            Quantity: <?php echo htmlspecialchars($row['quantity']); ?>
                        </p>

                        <p class="status">
                            <?php echo htmlspecialchars($row['status']); ?>
                        </p>

                        <div class="product-actions">

                            <?php if ($_SESSION['role'] == 'admin') { ?>

                                <a href="products/edit.php?id=<?php echo $row['id']; ?>"
                                    class="edit-btn">Edit</a>

                                <a href="products/delete.php?id=<?php echo $row['id']; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this product?');">
                                    Delete
                                </a>

                            <?php } ?>

                            <a href="products/sell.php?id=<?php echo $row['id']; ?>"
                                class="edit-btn sell-green">Sell</a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>No products found.</p>

        <?php } ?>

    </div>

</div>

</body>
</html>