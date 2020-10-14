<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuth();
checkRole();



$userId = isset($_GET['id']) ? $_GET['id']: 0;

$connect = getDbConnect();
$getUserByIdQuery = "select * from product_type where id_product_type = $userId";
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
        include('../assets/layout/style1.php');
    ?>




</head>

<body>
    <?php
        include('../assets/layout/header.php');
    ?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h2 style="text-align: center;">Sửa loại sản phẩm</h2>
                <form action="save_edit.php?id=<?= $user['id_product_type'] ?>" method="post"
                    enctype="multipart/form-data">
                    <label for="exampleInputEmail1">Tên loại</label>
                    <input type="text" name="name" class="form-control" value="<?= $user['name_product_type']?>">
                    <button type="submit" class="btn btn-primary">Lưu </button>
                    <button type="unset" class="btn btn-primary">Thoát</button>
                </form>
            </div>



            <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="copyright pull-right">
                &copy; <script>
                document.write(new Date().getFullYear())
                </script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
        </div>
    </footer>

    </div>
    </div>


</body>

<!-- chèn javascrip -->

</html>