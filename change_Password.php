<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";
$id = $_SESSION['users']['id'];
$sql = "select * from users where id = '$id'";

$connect = getDbConnect();
$stmt = $connect->prepare($sql);
$stmt->execute();
$listUser = $stmt->fetch();
$user = $listUser;
// var_dump($user);
// die();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php include('layout/style.php') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

</head>

<body>
    <?php include('layout/header.php') ?>
    <section class="info-user">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <img style="width: 200px; border-radius:110px ; margin: 1.5rem 0 0 0" src="<?= BASE_URL . $user['image'] ?>" class=" mx-auto d-block">
                    <div class="text-center text-monospace " style="font-size: 2rem;">
                        <?=
                            $_SESSION['users']['name'];
                        ?>
                    </div>
                </div>
                <div class="col-sm-6 form-group mx-auto d-block">
                    <form action="<?= BASE_URL ?>handling/cfChangPass.php" method="post">
                        current password :
                        <input class="form-control" type="password" name="nowPass" value="">
                        new password:
                        <input class="form-control" type="password" name="newPass" value="">
                        confirm new password:
                        <input class="form-control" type="password" name="cfNewPass" value="">
                        <div class="end d-flex justify-content-end">
                            <button class="btn btn-sm btn-info mr-2" type="submit">Save</button>
                            <a href="<?= BASE_URL ?>infoUser.php" class="btn btn-sm btn-danger ">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>

    <?php
    include('layout/footer.php');

    ?>
</body>

</html>