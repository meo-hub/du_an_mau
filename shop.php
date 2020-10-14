<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";


$admins = adminConnectListAdmin();
$users = adminConnectListUser();
$productType = adminConnectListProductType();
// $product = pagination();
$comment = adminConnectListComment();

// phan trang
$rowRender = 5;
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


$_SESSION['totalPage'] = $totlaPage;
$_SESSION['prevPage'] = ($curenPage > 1) ? $curenPage - 1 : $curenPage = 1;
$_SESSION['nextPage'] = ($curenPage >= $totlaPage) ? $totlaPage : $curenPage + 1;






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




    <!-- Breadcrumb Section Begin -->
    <!-- <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
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
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Hiển thị </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
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



                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="<?= BASE_URL . 'shop.php' ?>?page=<?= $_SESSION['prevPage'] ?>">Previous</a></li>

                            <?php
                            for ($t = 1; $t <= $totlaPage; $t++) { ?>
                                &nbsp;<a name="" id="" class="btn btn-primary" href="<?php echo BASE_URL ?>shop.php?page=<?= $t ?>" role="button"> <?= $t ?></a>
                            <?php
                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="<?= BASE_URL . 'shop.php' ?>?page=<?= $_SESSION['nextPage'] ?>">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
    </section>
    <!-- Shop Section End -->


    <?php
    include('layout/footer.php');

    ?>
</body>

</html>