<?php


require_once "lib/db.php";
require_once "lib/common.php";



$userId = isset($_GET['id']) ? $_GET['id'] : 0;

$connect = getDbConnect();
$getUserByIdQuery = "select * from users where id = $userId";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();
$user = $stmt->fetch();

// var_dump($getUserByIdQuery);
// die();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Thêm mới loại sản phẩm</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?php
    include('layout/style.php');
    ?>




</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="col-6 mx-auto">
                <h2 style="text-align: center;">Sửa thông tin người dùng</h2>
                <form action="<?= BASE_URL ?>savEdit.php?id=<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">

                    <label for="exampleInputName1">Họ và tên</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['name'] ?>" require>
                    <?php if (isset($_GET['nameerr'])) : ?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                    <?php endif ?>
                    <br>



                    <label for="exampleInputImage1">Ảnh đại diện</label>
                    <br>
                    <img src="<?= BASE_URL . $user['image'] ?>" alt="">
                    <br><br>
                    <label for="">Ảnh đại diện mới</label><br>
                    <input type="file" name="image" alt="">
                    <br>

                    <label for="">Email</label>
                    <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="" require>

                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?= $user['address'] ?>">

                    <br>
                    


                    <button type="submit" class="btn btn-primary ">Lưu mới</button>
                    <button type="unset" class="btn btn-primary">Thoát</button>
                </form>
            </div>
        </div>




    </div>

</body>

<!-- chèn javascrip -->

</html>