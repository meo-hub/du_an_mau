<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";


$idProduct = isset($_GET['id']) ? $_GET['id'] : 0;

$connect = getDbConnect();
$getProductByIdQuery = "select * from product where ma_hh = $idProduct";
$stmt = $connect->prepare($getProductByIdQuery);
$stmt->execute();
$productt = $stmt->fetch();


//s view
$view = $productt['so_luot_xem'] + 1;

$updateProduct = "update product 
                    set 
                        so_luot_xem = '$view '     
                        where ma_hh = $idProduct ";

$stmt = $connect->prepare($updateProduct);
$stmt->execute();



$admins = adminConnectListAdmin();
$users = adminConnectListUser();
$productType = adminConnectListProductType();
$product = adminConnectListProduct();
$comment = adminConnectListComment();
$commentt = connectListComment($idProduct);

// var_dump($commentt);
// die();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header.php') ?>





    <section class="shop spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form >
                                <input type="text" placeholder="Search...">
                                <button type="button"><span class="icon_search"></span></button>
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
                                                        <li><a href="#"><?= $cursor['name_product_type'] ?></a></li>
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

                    <div class="row">
                        <label style="font-size:45px; margin-left:90px;" class="display-flex justify-content-center">Chi tiết sản phẩm</label></center>
                        <div class="col-lg-12">
                            <label for="" style="font-size:25px ">Tên sản phẩm : <?= $productt['ten_hh'] ?></label>
                        </div>

                        <div class="col-lg-6">
                            <label style="font-size:20px " for="">Ảnh sản phẩm : </label>
                            <img src="" alt="">
                            <br>
                            <img src="<?= BASE_URL . $productt['hinh'] ?>" alt="" class="product__item__pic set-bg">
                        </div>
                        <div class="col-lg-6">
                            <label style="font-size:20px " for="">Mô tả:</label>
                            <br>
                            <label for=""><?= $productt['mo_ta'] ?></label>
                        </div>

                        <div class="col-lg-6" style="margin-top:10px;">
                            <label for="">Giá sản phẩm :<?= $productt['don_gia'] ?></label>
                            <br>
                            <label style="font-size:25px " for="">Giảm giá : <?= $productt['giam_gia'] ?> </label>
                        </div>
                    </div>
                    <br><br><br>
                    <!-- comment : Start  -->
                    <div class="row">
                        <div class="col-lg-12 .pb-3">
                            <form action="<?= BASE_URL ?>post_comment.php?detailId=<?= $idProduct ?>" method="post" enctype="multipart/form-data">
                                <div class="content d-flex justify-content-start">
                                    Comment :
                                </div>
                                <textarea class="form-control " name="noidung" id="" cols="30" rows="5"></textarea>
                                <br>
                                <button class="d-flex justify-content-end btn btn-primary" type="submit">Gửi</button>
                            </form>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Comment history -->
                            <h3>Bình luận</h3>
                            <hr>
                            <?php foreach ($commentt as $key => $cursor) : ?>
                                <label for=""><?= $cursor['name'] ?> </label>

                                <label class="" for=""><?= $cursor['ngay_bl'] ?></label>
                                <br>
                                <label for=""><?= $cursor['noi_dung'] ?></label>
                                <hr>




                            <?php endforeach ?>

                        </div>

                        <!-- comment : End -->
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