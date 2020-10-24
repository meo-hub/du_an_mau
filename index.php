<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";

$users = adminConnectListUser();
$productType = adminConnectListProductType();

$sql = "SELECT * FROM product ORDER BY ma_hh LIMIT 1, 6";
$connect = getDbConnect();
$stmt = $connect->prepare($sql);
$stmt->execute();
$dataRender = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header.php') ?>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">list Product Type</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">

                                                <ul class="">
                                                    <?php foreach ($productType as $key => $cursor) : ?>
                                                        <li><a href="<?= BASE_URL . "shop_type.php?idType=" . $cursor['id_product_type'] ?>"><?= $cursor['name_product_type'] ?></a></li>
                                                    <?php endforeach ?>
                                                </ul>

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
                                    <p>Hiển thị 6 sản phẩm trong cửa hàng</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($dataRender as $key => $cursor) : ?>
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
                        <div class="d-flex justify-content-end">
                            <a href="<?BASE_URL?>shop.php">xem thêm sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php
    include('layout/footer.php');
    ?>
</body>

</html>