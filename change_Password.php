<?php
require_once "lib/db.php";
require_once "lib/common.php";


// lấy id trên đường dẫn xuống
$userId = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra xem id có tồn tại trong db hay không 
$connect = getDbConnect();
$getUserByIdQuery = "select * from users where id = $userId";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();
$user = $stmt->fetch(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mk</title>
    <?php include_once "layout/style.php" ?>
</head>
<body>
    
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h3>Đổi mật khẩu</h3>
                    <form action="<?= BASE_URL ?>post-doi-mk.php" method="post">
                        <div class="form-group">
                            <label for="">Tên tài khoản</label>
                            <input type="text" hidden name="id" value="<?= $user['name']?>">
                            <input type="text" class="form-control" 
                                    disabled   
                                    value="<?= $user['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="old_password">
                            <?php if(isset($_GET['old_passworderr'])):?>
                            <span class="text-danger"><?= $_GET['old_passworderr'] ?></span>
                        <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password">
                            <?php if(isset($_GET['passworderr'])):?>
                            <span class="text-danger"><?= $_GET['passworderr'] ?></span>
                        <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="cfpassword">
                            <?php if(isset($_GET['cfpassworderr'])):?>
                            <span class="text-danger"><?= $_GET['cfpassworderr'] ?></span>
                        <?php endif ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-info">Đổi mật khẩu</button>
                            <a href="<?= BASE_URL ?>" class="btn btn-sm btn-danger">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>