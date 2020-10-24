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


// phan trang
$rowRender = 3;
$totalRow = "SELECT COUNT(*) FROM product ";
$conn = getDbConnect();
$stmt = $conn->prepare($totalRow);
$stmt->execute();
$listRow = $stmt->fetchColumn();

// kết nối và thực thi câu lệnh sql
$totlaPage = ceil($listRow / $rowRender);
$curenPage = (isset($_GET['page']) ? $_GET['page'] : 1);
//die($listRow);
if ($curenPage < 1) {
    $curenPage = 1;
}
if ($curenPage >= $totlaPage) {
    $curenPage = $totlaPage;
}
$start = ($curenPage - 1) * $totlaPage;
$sql = "SELECT * FROM product ORDER BY ma_hh LIMIT {$start},{$rowRender}";
$connect = getDbConnect();
$stmt = $connect->prepare($sql);
$stmt->execute();
$dataRender = $stmt->fetchAll();

// var_dump($dataRender);
// die();

$_SESSION['totalPage'] = $totlaPage;
$_SESSION['prevPage'] = ($curenPage > 1) ? $curenPage - 1 : $curenPage = 1;
$_SESSION['nextPage'] = ($curenPage >= $totlaPage) ? $totlaPage : $curenPage + 1;



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
            <!-- danh sách sản phẩm -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách Sản phẩm</h4>
                            <p class="category">Có thể sửa đổi</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th width="70px">Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Giảm giá</th>
                                        <th>Ngày nhập</th>
                                        <th>Mô tả</th>
                                        <th>Đặc biệt</th>
                                        <th>Mã loại</th>
                                        <th>Số lượt xem</th>

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
                                            <td>
                                                <img style="width: 70px;" src="<?= BASE_URL . $cursor['hinh'] ?>" class="img-fluid">
                                            </td>
                                            <td><?= $cursor['don_gia'] ?></td>
                                            <td><?= $cursor['giam_gia'] ?></td>
                                            <td><?= $cursor['ngay_nhap'] ?></td>
                                            <td><?= $cursor['mo_ta'] ?></td>
                                            <td><?= $cursor['dac_biet'] ?></td>
                                            <td><?= $cursor['ma_loai'] ?></td>
                                            <td><?= $cursor['so_luot_xem'] ?></td>


                                            <td>
                                                <a href="<?= BASE_URL ?>admin/product/edit.php?id=<?= $cursor['ma_hh'] ?>" class="btn btn-info btn-sm"> Sửa </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')" href="<?= BASE_URL ?>admin/product/delete.php?id=<?= $cursor['ma_hh'] ?>" class="btn btn-danger btn-sm"> Xóa </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="<?= BASE_URL . 'admin/listProduct.php' ?>?page=<?= $_SESSION['prevPage'] ?>">Previous</a></li>

                        <!-- <?php
                        for ($t = 1; $t <= $totlaPage; $t++) { ?>
                            &nbsp;<a name="" id="" class="btn btn-primary" href="<?php echo BASE_URL ?>admin/listProduct.php?page=<?= $t ?>" role="button"> <?= $t ?></a>
                        <?php
                        }
                        ?> -->
                        <li class="page-item"><a class="page-link" href="<?= BASE_URL . 'admin/listProduct.php' ?>?page=<?= $_SESSION['nextPage'] ?>">Next</a></li>
                    </ul>
                </nav>
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
</html>