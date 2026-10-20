<?php 
session_start(); 
include "../config/database.php"; 

if (isset($_POST['login'])) { 
    $name = $_POST['name']; 
    $password = $_POST['password']; 

    // Name validation
    if (!preg_match("/^[A-Za-z ]+$/", $name)) {
        $error = "Name can contain only letters and spaces.";
    }
    // Password validation
    elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{6,}$/", $password)) {
        $error = "Password must contain uppercase, lowercase, number, special character and minimum 6 characters.";
    }
    else {
        $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'"; 
        $result = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($result) == 1) { 
            $user = mysqli_fetch_assoc($result); 
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['user_name'] = $user['name']; 
            $_SESSION['role'] = $user['role']; 
            header("Location: /product-management/"); 
            exit; 
        } else { 
            $error = "Invalid name or password"; 
        } 
    }
} 
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Login</title> 
    <link rel="stylesheet" href="../css/login.css"> 
</head> 
<body> 
<div class="login-container"> 
    <div class="login-box"> 
        <h2>Login</h2> 
        <?php if (isset($error)) { ?> 
            <div class="error-message"> 
                <?php echo $error; ?> 
            </div> 
        <?php } ?> 

        <form method="POST"> 
            <div class="form-group"> 
                <label>Name:</label> 
                <input type="text" name="name" placeholder="Enter your name"
                pattern="[A-Za-z ]+" title="Only letters and spaces are allowed" required>
            </div> 

            <div class="form-group"> 
                <label>Password:</label> 
                <input type="password" name="password" placeholder="Enter your password"
                pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{6,}"
                title="Minimum 6 characters with uppercase, lowercase, number and special character" required>
            </div> 

            <button type="submit" name="login" class="login-btn">Login</button> 
        </form> 

        <div class="signup-link"> 
            <p>Don't have an account?</p> 
            <a href="signup.php">Create New Account</a> 
        </div> 
    </div> 
</div> 
</body> 
</html>