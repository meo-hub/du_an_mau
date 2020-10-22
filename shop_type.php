<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";


$id_type = isset($_GET['idType']) ? $_GET['idType'] : "";

// var_dump($id_type);
// die();
$tv = "select * from product where ma_loai = '$id_type' ";
$connect0 = getDbConnect();
$stmt0 = $connect0->prepare($tv);
$stmt0->execute();
$pro = $stmt0->fetchAll();




$admins = adminConnectListAdmin();
$users = adminConnectListUser();
$productType = adminConnectListProductType();

$comment = adminConnectListComment();


$row = 5;

$sql = "select count(*) from product ";
$connect = getDbConnect();
$stmt = $connect->prepare($sql);
$stmt->execute();
$number = $stmt->fetchColumn();
$total_row = $number;

$total_page = ceil($total_row / $row);


$current_page = 1;
if (!isset($_REQUEST['page_no'])) {
    $current_page = 1;
} else {
    $current_page =   $_REQUEST['page_no'];
}

if ($current_page < 1)
    $current_page = 1;

if ($current_page > $total_page)
    $current_page = $total_page;

$start = ($current_page - 1) * $row;

$sql_1 = "select * from product ORDER BY ma_hh LIMIT {$start}, {$row} ";
$connect = getDbConnect();
$stmt = $connect->prepare($sql_1);
$stmt->execute();
$result = $stmt->fetchAll();

$_SESSION['total_page'] = $total_page;
$_SESSION['prev_page'] = ($current_page > 1) ? ($current_page - 1) : 1;
$_SESSION['next_page'] = ($current_page < $total_page) ? ($current_page + 1) : $total_page;

$product = $result;





// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <?php include('layout/style.php') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

</head>

<body>
    <?php include('layout/header.php') ?>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Danh mục sản phẩm</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">

                                                <ul class="">
                                                    <?php foreach ($productType as $key => $cursor) : ?>
                                                        <li><a href="<?= BASE_URL . "shop_type.php?idType=" . $cursor['id_product_type'] ?>"><?= $cursor['name_product_type'] ?></a>
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Sản phẩm được yêu thích
                                            nhất</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>hiểm thị
                                        all
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php

                        ?>
                        <?php foreach ($pro as $key => $cursor) : ?>


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="<?= BASE_URL ?>product_detail.php?id=<?= $cursor['ma_hh'] ?>">

                                        <img src="<?= BASE_URL . $cursor['hinh'] ?>" alt="" class="product__item__pic set-bg">
                                    </a>
                                    <div class="product__item__text">
                                        <h6><?= $cursor['ten_hh'] ?></h6>
                                        <a href="#" class="add-cart">Thêm vào giỏ hàng</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5><?= number_format($cursor['don_gia'], 0, ".", ",") ?>VNĐ</h5>
                                        <div class="product__color__select">
                                            <label for="pc-4">
                                                <input type="radio" id="pc-4">
                                            </label>
                                            <label class="active black" for="pc-5">
                                                <input type="radio" id="pc-5">
                                            </label>
                                            <label class="grey" for="pc-6">
                                                <input type="radio" id="pc-6">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <nav aria-label="Page navigation example">

                                    </nav>
                                </div>
                                <div class="col-lg-12">
                                    <div class="product__pagination d-flex justify-content-center">
                                        <ul class="pagination">
                                            <li class="page-item btn"><a href="<?= BASE_URL ?>shop.php?btn_list&page_no=1">&#8810;</a></li>
                                            <?php
                                            for ($i = 1; $i <= $_SESSION['total_page']; $i++) {
                                                echo '<li class="page_item btn"><a href="?btn_list&page_no=' . $i . '">' . $i . '</a></li>';
                                            }
                                            ?>
                                            <li class="page-item btn"><a href="?btn_list&page_no=<?= $_SESSION['next_page'] ?>">&#8811;</a></li>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- Shop Section End -->


    <?php
    include('layout/footer.php');

    ?>
</body>

</html>