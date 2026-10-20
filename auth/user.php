<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /product-management/auth/login.php");
    exit;
}
include "../config/database.php";
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="../css/users.css">
</head>
<body>
<div class="users-container">
    <div class="users-box">
        <h2>Registered Users</h2>
        <a href="../index.php" class="back-btn">
            ← Back to Dashboard
        </a>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['password']; ?>
                    </td>
                    <td>
                        <?php echo $row['createdAt']; ?>
                    </td>
                    <td>
                        <a
                            href="update.php?id=<?php echo $row['id']; ?>" class="update-btn">Update</a>
                        <a
                            href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn"
                            onclick="return confirm('Are you sure you want to delete this user?');"
                        >Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>