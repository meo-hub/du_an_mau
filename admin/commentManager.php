<?php
session_start();
require_once "../lib/db.php";
require_once "../lib/common.php";
// checkAuth();
checkRole();


$admins = adminConnectListAdmin();
$users = adminConnectListUser();
$productType = adminConnectListProductType();
$product = adminConnectListProduct();
$comment = adminConnectListComment();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Trang quản lý của admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?php
    include('assets/layout/style.php');
    ?>
    <style>
        .main-panel {
            background-color: #000 !important;
        }

        .card {
            background-color: #141414;
        }

        .title {
            color: #fff !important;
        }

        tr {
            background-color: #141414 !important;
            color: #fff !important;
        }

        .footer a {
            color: #fff !important;
        }
    </style>



</head>

<body>
    <?php
    include('assets/layout/header.php');
    ?>


    <div class="content">
        <div class="container-fluid">
            <!-- Quản lý bình luận -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách bình luận</h4>
                            <p class="category">Có thể sửa đổi</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã BL</th>
                                        <th>Nội dung</th>
                                        <th>Mã hàng hóa</th>
                                        <th>Mã khách hàng</th>
                                        <th>Ngày bình luận</th>
                                        <!-- <th>
                                            <a href="<?= BASE_URL ?>admin/product/add_new.php" class="btn btn-sm btn-success">
                                                Tạo mới
                                            </a>
                                        </th> -->


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comment  as $key => $cursor) : ?>
                                        <tr>
                                            <td><?= $cursor['ma_bl'] ?></td>
                                            <td><?= $cursor['noi_dung'] ?></td>
                                            <td><?= $cursor['ma_hh'] ?></td>
                                            <td><?= $cursor['ma_kh'] ?></td>
                                            <td><?= $cursor['ngay_bl'] ?></td>




                                            <td>
                                                <!-- <a href="<?= BASE_URL ?>comment/edit.php?id=<?= $cursor['ma_bl'] ?>" class="btn btn-info btn-sm"> Sửa </a> -->
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa comment khoản này?')" href="<?= BASE_URL ?>comment/delete.php?id=<?= $cursor['ma_bl'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>


    <footer class="footer" style="background-color: #141414;">
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