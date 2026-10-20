<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Product Management System</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">Product Management</div>
        <div class="nav-links">
            <a href="homepage.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="contact.php">CONTACT</a>
            <a href="auth/login.php">LOGIN</a>
            <a href="auth/signup.php">REGISTER</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <p>CONTACT US</p>
            <h1>Get In Touch With Us</h1>
            <p>We are here to help you with your product management needs.</p>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact-section">
        <div class="contact-container">

            <!-- CONTACT INFORMATION -->
            <div class="contact-info">
                <p class="small-title">CONTACT INFORMATION</p>
                <h2>We Would Love To Hear From You</h2>
                <p> If you have any questions, suggestions or need any
                    information about our Product Management System,
                    feel free to contact us.</p>
                <div class="info-box">
                    <h3>Address</h3>
                    <p>Vapi, Gujarat, India</p>
                </div>
                <div class="info-box">
                    <h3>Email</h3>
                    <p>support@productmanagement.com</p>
                </div>
                <div class="info-box">
                    <h3>Phone</h3>
                    <p>+91 98765 43210</p>
                </div>
                <div class="info-box">
                    <h3>Working Hours</h3>
                    <p>Monday - Saturday : 9:00 AM - 6:00 PM</p>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="contact-form">
                <p class="small-title">SEND US A MESSAGE</p>
                <h2>Contact Us</h2>
                <form action="" method="post">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your name" required >
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required >
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Enter subject" required >
                    <label>Message</label>
                    <textarea
                        name="message" rows="6" placeholder="Write your message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <h3>Product Management System</h3>
        <p>Simple and convenient product management for everyone.</p>
        <p>© 2026 Product Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>