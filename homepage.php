<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">
            <span>PM</span> Product Management
        </div>
        <nav>
            <a href="#home">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="contact.php">CONTACT</a>
            <a href="auth/login.php">LOGIN</a>
            <a href="auth/signup.php" class="register-btn">REGISTER</a>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="small-title">WELCOME TO OUR SYSTEM</p>
            <h1>Product Management System</h1>
            <p>Manage your products, inventory and business information easily in one place.</p>
            <a href="auth/login.php" class="hero-btn">Get Started</a>
        </div>
    </section>

    <!-- IMAGE SECTION 1 -->
    <section class="image-section">
        <div class="image-box">
            <img src="images/inventory.jpg" alt="Inventory Management">
        </div>
        <div class="image-content">
            <p class="small-title">INVENTORY MANAGEMENT</p>
            <h2>Manage Your Inventory</h2>
            <p>Keep track of your products, stock quantity,categories and product status easily.</p>
            <a href="auth/login.php" class="dark-btn">Manage Products</a>
        </div>
    </section>

    <!-- IMAGE SECTION 2 -->
    <section class="image-section reverse">
        <div class="image-content">
            <p class="small-title">ONLINE SHOPPING</p>
            <h2>Easy Product Management</h2>
            <p>Manage product information in one place and keep your business organized.</p>
            <a href="auth/login.php" class="dark-btn">Get Started</a>
        </div>
        <div class="image-box">
            <img src="images/shopping.jpg" alt="Online Shopping">
        </div>
    </section>

    <!-- IMAGE SECTION 3 -->
    <section class="image-section">
        <div class="image-box">
            <img src="images/store.jpg" alt="Shopping Store">
        </div>
        <div class="image-content">
            <p class="small-title">BUSINESS MANAGEMENT</p>
            <h2>Grow Your Business</h2>
            <p>Organize your products and manage your business information with a simple system.</p>
            <a href="auth/login.php" class="dark-btn">Get Started</a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-logo">Product Management System</div>
        <p>© 2026 Product Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>