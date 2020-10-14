<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";

$noi_dung = $_POST['noidung'];
$noi_dungErr = "";

$ma_hh = $_GET['detailId'];

$ma_kh = $_SESSION['users']['id'];

$time_now = getdate();
$ngay_bl = $time_now['year'] . '.' . $time_now['mon'] . '.' . $time_now['mday'];

// var_dump('TODAY()');
// die();

if($noi_dungErr != ""){
    header('location:'. BASE_URL . "product_detail.php?id=$ma_hh");
    die();

}

$insertQuery = "insert into comment
(noi_dung , ma_hh , ma_kh , ngay_bl)
values 
('$noi_dung', '$ma_hh' , '$ma_kh' , '$ngay_bl' )";


// var_dump($insertQuery);
// die();

                    // 5. Thực thi câu query với csdl
$connect = getDbConnect();
$stmt = $connect->prepare($insertQuery); // nạp câu sql query vào trong kết nối
$stmt->execute(); // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
// var_dump($insertQuery);
// die();
header('location:'. BASE_URL . "product_detail.php?id=$ma_hh");



?>