<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}
include "../config/database.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("User ID not found");
}
$id = intval($_GET['id']);
$sql = "DELETE FROM users WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: user.php");
    exit;
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}
?>