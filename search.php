<?php
if (isset($_GET['search'])) {
    $search = urlencode($_GET['search']);

    header("Location: index.php?search=" . $search);
    exit;
}

header("Location: index.php");
exit;
?>