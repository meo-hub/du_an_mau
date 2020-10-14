<?php

session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuth();
checkRole();

$getCategoryDataQuery = "select * from comment";
$connect = getDbConnect();
$stmt = $connect->prepare($getCategoryDataQuery);
$stmt->execute();
$comment = $stmt->fetchAll();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Thêm mới  sản phẩm</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?php
        include('../assets/layout/style1.php');
    ?>




</head>

<body>
    <?php
        include('../assets/layout/header.php');
    ?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h2 style="text-align: center;">Thêm mới sản phẩm</h2>
                <form action="save_add_new.php" method="post" enctype="multipart/form-data">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <?php if(isset($_GET['nameerr'])):?>
                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                    <?php endif ?>
                    <br>

                    <label for="">Hình ảnh</label>
                    <input type="file" name="image" id="">

                    <br>

                    <label for="">Đơn giá</label>
                    <input type="number" name="price" id="" class="form-control">
                    <br>

                    <label for="">Giảm giá</label>
                    <input type="number" name="sale" id="" class="form-control">
                    <br>

                    <label for="">ngày nhập</label>
                    <input type="date" name="date" id="" class="form-control" >
                        <br>
                    <label for="">Mô tả</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        <br>
                    <label for="">Đặc biệt</label>
                    <input type="text" name="especially" class="form-control">
                    
                    <br>

                    <div class="form-group">
                        <label for="">Loại sản phẩm</label>
                        <select name="type" >
                            
                            <?php foreach($comment as $c):?>

                            <option class="form-control" <?php
                                    
                                ?>  value="<?= $c['id_product_type'] ?>">
                                <?= $c['name_product_type']?>
                            </option>
                            <?php endforeach ?>
                            </select>

                        

                    </div>
                    



                    <button type="submit" class="btn btn-primary ">Lưu mới</button>
                    <button type="unset" class="btn btn-primary">Thoát</button>
                </form>
            </div>



            <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
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