<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">

            <?php if(isset($_SESSION['users']) && !empty($_SESSION['users'])): ?>

            <li style="float: right;">
                <a href="javascript:;" class="nav-link httk ml-5">

                    Xin chào, <?= $_SESSION['users']['name'] ?>
                </a>

                <a class="nav-link httk" href="<?= BASE_URL. "users/doi-mk.php"?>">Đổi mật khẩu</a>
            </li>
            <li>
                <a class="nav-link httk" href="<?= BASE_URL. "logout.php"?>">Đăng xuất</a>
            </li>
            <?php endif?>





        </div>
        <div class="offcanvas__top__hover">
            <span>VNĐ <i class="arrow_carrot-down"></i></span>
            <ul>
                <li>VNĐ</li>
                <li>EUR</li>
                <li>USD</li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">

        <a href="#"><img src="img/icon/heart.png" alt=""></a>
        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
        <div class="price">0,00 VNĐ</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Giao hàng tận nơi , hoàn trả phí trong 30 ngày nếu khách hàng không tin dùng</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
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
                        <?php if(isset($_SESSION['users']) && !empty($_SESSION['users'])): ?>
                        <nav id="" class="navbar navbar-black bg-black justify-content-end">
                            <!--  -->       
                            <ul class="nav nav-pills">
                            <li class="nav-item">
                                <?php if($_SESSION['users']['role'] == 1 && $_SESSION['users']['active']==1): ?>
                                <a class="nav-link" href="<?=BASE_URL."admin/index.php"?>">Quản trị website</a>
                                <?php endif?>
                                <!--  -->
                            </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown" data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="true" aria-expanded="false">Xin chào,
                                        <?= $_SESSION['users']['name'] ?></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="change_Password.php">Thông tin người dùng</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=BASE_URL ."logout.php"?>">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <?php endif?>
                        <!-- khi da dang nhap : end  -->
                        <?php  if(
                            !isset($_SESSION['users']) && empty($_SESSION['users'])): ?>
                        <li>
                            <a href="<?= BASE_URL. "login.php"?>">Đăng nhập</a>
                            <a href="<?= BASE_URL. "registration.php"?>">Đăng kí</a>
                        </li>
                        <?php endif?>
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
                        <li class="active"><a href="<?= BASE_URL ."index.php"?>">TRANG CHỦ</a></li>
                        <li><a href="<?= BASE_URL ."shop.php"?>">SHOP</a></li>
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
<!-- Header Section End -->