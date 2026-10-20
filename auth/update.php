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
/* Get user data */ 
$sql = "SELECT * FROM users WHERE id = $id"; 
$result = mysqli_query($conn, $sql); 
$user = mysqli_fetch_assoc($result); 
if (!$user) { 
    die("User not found"); 
} 
/* Update user */ 
if (isset($_POST['update'])) { 
    $name = $_POST['name']; 
    $password = $_POST['password']; 
    $sql = "UPDATE users SET name='$name', password='$password' WHERE id=$id"; 
    if (mysqli_query($conn, $sql)) { 
        header("Location: user.php"); 
        exit; 
    } else { 
        echo "Error updating user: " . mysqli_error($conn); 
    } 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Update User</title> 
    <link rel="stylesheet" href="../css/login.css"> 
</head> 
<body>
<div class="login-container"> 
    <div class="login-box"> 
        <h2>Update User</h2> 
        <form method="POST"> 
            <div class="form-group"> 
                <label>Name:</label> 
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required> 
            </div> 
            <div class="form-group"> 
                <label>Password:</label> 
                <input type="text" name="password" value="<?php echo $user['password']; ?>" required> 
            </div> 
            <button type="submit" name="update" class="login-btn">Update User</button> 
        </form> 
        <div class="signup-link"> 
            <a href="user.php">← Back to Users</a> 
        </div> 
    </div> 
</div> 
</body> 
</html>