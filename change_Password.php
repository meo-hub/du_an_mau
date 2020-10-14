<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "layout/style.php" ?>
</head>

<body>
    <div class="form-group">
        <label for="">TÊN ĐĂNG NHẬP</label>
        <input type="text" name="id" placeholder="Tên đăng nhập" disabled class="form-control" value="<?php echo $value ?>">
    </div>
    <div class="form-group">
        <label for="">MẬT KHẨU CŨ</label>
        <input type="password" name="old_password" placeholder="Mật khẩu cũ" class="form-control">
        <?php if (isset($_GET['old_passworderr'])) : ?>
            <span class="text-danger"> <?= $_GET['old_passworderr'] ?> </span>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="">MẬT KHẨU MỚI</label>
        <input type="password" name="password" placeholder="Mật khẩu mới" class="form-control">
        <?php if (isset($_GET['passworderr'])) : ?>
            <span class="text-danger"> <?= $_GET['passworderr'] ?> </span>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="">XÁC NHẬN MẬT KHẨU</label>
        <input type="password" name="cf_password" placeholder="Nhập lại mật khẩu mới" class="form-control">
        <?php if (isset($_GET['cf_passworderr'])) : ?>
            <span class="text-danger"> <?= $_GET['cf_passworderr'] ?> </span>
        <?php endif ?>
    </div>
</body>

</html>