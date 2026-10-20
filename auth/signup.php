
<?php 
include "../config/database.php"; 

if (isset($_POST['signup'])) { 
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
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password')"; 

        if (mysqli_query($conn, $sql)) { 
            echo "Signup successful!"; 
        } else { 
            echo "Error: " . mysqli_error($conn); 
        } 
    }
} 
?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Signup</title> 
    <link rel="stylesheet" href="../css/login.css"> 
</head> 
<body> 
<div class="login-container"> 
    <div class="login-box"> 
        <h2>Create Account</h2> 

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

            <button type="submit" name="signup" class="login-btn">
                Create Account
            </button> 
        </form> 

        <div class="signup-link"> 
            <p>Already have an account?</p> 
            <a href="login.php">Login Here</a> 
        </div> 
    </div> 
</div> 
</body> 
</html>