<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper" style="background-color: #1f1f1f;">
            <div class="logo">
                <a href="#" class="simple-text">
                    I AM HERO
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href=<?= BASE_URL . "admin/index.php" ?>>
                        <i class="pe-7s-graph"></i>
                        <p>Tổng thể</p>
                    </a>
                </li>
                <!-- <li>
                    <a href=<?= BASE_URL . "admin/user.php" ?>>
                        <i class="pe-7s-user"></i>
                        <p>Thông tin người dùng</p>
                    </a>
                </li> -->
                <li>
                    <a href=<?= BASE_URL . "admin/listUser.php" ?>>
                        <i class="pe-7s-note2"></i>
                        <p>Danh sách người dùng</p>
                    </a>
                </li>
                <li>
                    <a href=<?= BASE_URL . "admin/listProductType.php" ?>>
                        <i class="pe-7s-note2"></i>
                        <p>Danh sách Loại sản phẩm</p>
                    </a>
                </li>
                <li>
                    <a href=<?= BASE_URL . "admin/listProduct.php" ?>>
                        <i class="pe-7s-note2"></i>
                        <p>Danh sách Sản phẩm</p>
                    </a>
                </li>
                <li>
                    <a href=<?= BASE_URL . "admin/commentManager.php" ?>>
                        <i class="pe-7s-note2"></i>
                        <p>Quản lý bình luân</p>
                    </a>
                </li>
                <li>
                    <a href=<?= BASE_URL . "admin/listSlide.php" ?>>
                        <i class="pe-7s-note2"></i>
                        <p>Quản lý slide trang website</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background-color: #141414; border: none;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= BASE_URL ?>">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="<?= BASE_URL ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <p class="hidden-lg hidden-md">Cửa hàng</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    <?= $_SESSION['users']['name'] ?>
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thông tin tài khoản</a></li>
                                <li><a href="http://localhost:8080/php/du_an_web204/change_Password.php">Đổi mật khẩu</a></li>
                                <li><a href="<?= BASE_URL . "logout.php" ?>">Đăng xuất</a></li>


                            </ul>
                        </li>

                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>