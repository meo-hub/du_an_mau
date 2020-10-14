<?php
session_start();
require_once "../lib/db.php";
require_once "../lib/common.php";
checkAuth();
checkRole();

$admins = adminConnectListAdmin();
$users = adminConnectListUser();
$productType = adminConnectListProductType();
$product = adminConnectListProduct();
$comment = adminConnectListComment();

// var_dump(count($product));
// die();
$totalRow = "SELECT COUNT(*) FROM product ";
$conn = getDbConnect();
$stmt = $conn->prepare($totalRow);
$stmt->execute();
$listRow = $stmt->fetchColumn();


$sql = "SELECT * FROM product LIMIT 5";
$connect = getDbConnect();
$stmt = $connect->prepare($sql);
$stmt->execute();
$dataRender = $stmt->fetchAll();


// var_dump(count($dataRender));
// die();


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


    <div class="content" style="background-color: #000;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Admin</h4>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Country</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($admins as $key => $cursor) : ?>
                                        <tr>
                                            <td><?= $cursor['id'] ?></td>
                                            <td><?= $cursor['name'] ?></td>
                                            <td>
                                                <img style="width: 70px;" src="<?= BASE_URL . $cursor['image'] ?>" class="img-fluid">
                                            </td>
                                            <td><?= $cursor['email'] ?></td>
                                            <td><?= $cursor['address'] ?></td>



                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Danh sách người dùng -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Người dùng</h4>
                            <p class="category">Có thể sửa đổi</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>
                                            <a href="<?= BASE_URL ?>admin/user/add_new.php" class="btn btn-sm btn-success">
                                                Tạo mới
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $cursor) : ?>
                                        <tr>
                                            <td><?= $cursor['id'] ?></td>
                                            <td><?= $cursor['name'] ?></td>
                                            <td>
                                                <img style="width: 70px;" src="<?= BASE_URL . $cursor['image'] ?>" class="img-fluid">
                                            </td>
                                            <td><?= $cursor['email'] ?></td>
                                            <td><?= $cursor['address'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL ?>admin/user/edit.php?id=<?= $cursor['id'] ?>" class="btn btn-info btn-sm"> Sửa </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')" href="<?= BASE_URL ?>admin/user/delete.php?id=<?= $cursor['id'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!--  Danh sách loại sản phẩm -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Loại sản phẩm</h4>
                            <p class="category">Có thể sửa đổi</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>

                                        <th>
                                            <a href="<?= BASE_URL ?>admin/product_type/add_new.php" class="btn btn-sm btn-success">
                                                Tạo mới
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productType as $key => $cursor) : ?>
                                        <tr>
                                            <td><?= $cursor['id_product_type'] ?></td>
                                            <td><?= $cursor['name_product_type'] ?></td>



                                            <td>
                                                <a href="<?= BASE_URL ?>admin/product_type/edit.php?id=<?= $cursor['id_product_type'] ?>" class="btn btn-info btn-sm"> Sửa </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')" href="<?= BASE_URL ?>admin/product_type/delete.php?id=<?= $cursor['id_product_type'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!-- danh sách sản phẩm -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Sản phẩm</h4>
                            <p class="category">Có thể sửa đổi</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <h3 style="color: #fff;">hiện thị
                                <?echo(count($dataRender))?> trên
                                <?echo($listRow)?> sản phẩm
                            </h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Giảm giá</th>
                                        <th>Mô tả</th>
                                        <th>Ngày nhập</th>
                                        <th>Đặc biệt</th>
                                        <th>Số lượt xem</th>
                                        <th>Mã loại</th>
                                        <th>
                                            <a href="<?= BASE_URL ?>admin/product/add_new.php" class="btn btn-sm btn-success">
                                                Tạo mới
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataRender as $key => $cursor) : ?>
                                        <tr>
                                            <td><?= $cursor['ma_hh'] ?></td>
                                            <td><?= $cursor['ten_hh'] ?></td>
                                            <td><?= $cursor['don_gia'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $cursor['hinh'] ?>" class="img-fluid" width="70px">
                                            </td>
                                            <td><?= $cursor['ngay_nhap'] ?></td>
                                            <td><?= $cursor['mo_ta'] ?></td>
                                            <td><?= $cursor['giam_gia'] ?></td>
                                            <td><?= $cursor['dac_biet'] ?></td>
                                            <td><?= $cursor['so_luot_xem'] ?></td>
                                            <td><?= $cursor['ma_loai'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL ?>admin/product/edit.php?id=<?= $cursor['ma_hh'] ?>" class="btn btn-info btn-sm"> Sửa </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')" href="<?= BASE_URL ?>admin/product/delete.php?id=<?= $cursor['ma_hh'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="text-right">
                            <a  href="http://localhost:8080/php/du_an_web204/admin/listProduct.php"> xem thêm sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Quản lý bình luận -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách bình luận</h4>
                            <p class="category">Có thể xoá</p>
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
                                                <!-- <a href="<?= BASE_URL ?>users/edit.php?id=<?= $cursor['id'] ?>" class="btn btn-info btn-sm"> Sửa </a> -->
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')" href="<?= BASE_URL ?>users/remove.php?id=<?= $cursor['id'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
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
                </script> <a href="#">Creative Méo</a>, made with love for a better web
            </p>
        </div>
    </footer>

    </div>
    </div>


</body>

<!-- chèn javascrip -->

</html>