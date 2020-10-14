<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php include('layout/style.php') ?>
</head>
<body>
    <?php include('layout/header.php')?>

<?php
include('layout/footer.php');

?>   
</body>
</html>
    