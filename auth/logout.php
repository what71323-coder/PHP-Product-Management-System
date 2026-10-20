<?php
session_start();
session_unset();
session_destroy();
header("Location: /product-management/auth/login.php");
exit;
?>   