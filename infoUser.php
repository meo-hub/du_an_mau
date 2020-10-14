<?

require_once('lib/common.php');
require_once('lib/db.php');

$userId = isset($_GET['id']) ? $_GET['id']: 0;

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
    <title>Document</title>
    <?php include('layout/style.php') ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
            background: #F1F3FA;
        }

        /* Profile container */
        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Giao hàng tận nơi , hoàn trả phí trong 30 ngày nếu khách hàng không tin dùng</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <!-- khi da dang nhap : start -->
                            <?php if (isset($_SESSION['users']) && !empty($_SESSION['users'])) : ?>
                                <nav id="" class="navbar navbar-black bg-black justify-content-end">
                                    <!--  -->
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <?php if ($_SESSION['users']['role'] == 1 && $_SESSION['users']['active'] == 1) : ?>
                                                <a class="nav-link" href="<?= BASE_URL . "admin/index.php" ?>">Quản trị website</a>
                                            <?php endif ?>
                                            <!--  -->
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Xin chào,
                                                <?= $_SESSION['users']['name'] ?></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="infoUser.php?id=<?= $_SESSION['users']['id'] ?>">Thông tin người dùng</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?= BASE_URL . "logout.php" ?>">Đăng xuất</a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            <?php endif ?>
                            <!-- khi da dang nhap : end  -->
                            <?php if (
                                !isset($_SESSION['users']) && empty($_SESSION['users'])
                            ) : ?>
                                <li>
                                    <a href="<?= BASE_URL . "login.php" ?>">Đăng nhập</a>
                                    <a href="<?= BASE_URL . "registration.php" ?>">Đăng kí</a>
                                </li>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="<?BASE_URL?>index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="<?= BASE_URL . "index.php" ?>">TRANG CHỦ</a></li>
                            <li><a href="<?= BASE_URL . "shop.php" ?>">SHOP</a></li>
                            <li><a href="#">GIỚI THIỆU</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">

                        <a href="#"><img src="img/icon/heart.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">0.00 VNĐ</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <div class="container">
        <div class="row profile">
            <div class="col-md-9 mx-auto">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="d-flex justify-content-center">
                        <img src="<?= BASE_URL . $user['image'] ?>" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            name: <?= $user['name'] ?>
                        </div>
                        <div class="profile-usertitle-job">
                            mail: <?= $user['email'] ?>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a class="btn btn-success btn-sm" href="http://localhost:8080/php/du_an_web204/test.php?id=<?= $user['id'] ?>">Edit profile</a>
                        <a class="btn btn-danger btn-sm" href="http://localhost:8080/php/du_an_web204/change_Password.php?id=<?= $user['id'] ?>">Đổi mật khẩu</a>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu d-flex justify-content-center">
                        <ul class="nav ">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Tasks </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>

        </div>
    </div>

</body>

</html>