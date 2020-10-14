<?php
require_once "./lib/common.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <?php include_once "layout/style.php" ?>
</head>

<body>
    <?php  ?>
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3 pt-3">

                    <h3>Đăng kí tài khoản</h3>

                    <form action="<?= BASE_URL ?>confirm_Regis.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" name="name">
                            <?php if (isset($_GET['nameerr'])) : ?>
                                <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                            <?php endif ?>
                        </div>


                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" require>
                            <?php if (isset($_GET['emailerr'])) : ?>
                                <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" require>
                            <?php if (isset($_GET['password'])) : ?>
                                <span class="text-danger"><?= $_GET['password'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="cfpassword" require>
                            <?php if (isset($_GET['password'])) : ?>
                                <span class="text-danger"><?= $_GET['cfpassword'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputImage1">Ảnh đại diện</label>
                            <br>
                            <input type="file" src="" name="image" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthDate" require>

                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" require>

                        </div>

                        <br>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-info">Đăng kí</button>
                            <a href="<?= BASE_URL ?>" class="btn btn-sm btn-danger">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>