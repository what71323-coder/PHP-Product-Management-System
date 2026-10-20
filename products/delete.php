<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}
include "../config/database.php";
if (!isset($_GET['id'])) {
    die("Product ID not found");
}
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: /product-management/");
    exit;
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>