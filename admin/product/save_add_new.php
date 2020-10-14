<?php

require_once "../../lib/db.php";
require_once "../../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl

// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

$avatar = $_FILES['image'];
$path = "";
$imgErr = "";

$price = $_POST['price'];
$priceErr = "";
$price = (int)$price;


$sale = $_POST['sale'];
$saleErr = "";

$date = $_POST['date'];

$des = $_POST['description'] ; 

$esp = $_POST['especially'];
$espErr = '';
$type = $_POST['type'];

if(strlen($name) == 0){
    $nameErr = "Hãy nhập tên sản phẩm";
}
// ktra số lượng ký tự
if($nameErr == "" && (strlen($name) < 2 || strlen($name) > 100)){
    $nameErr = "Độ dài sản phẩm nằm trong khoảng 2 - 100 ký tự";
}
if( $price <= 0){
    $priceErr = "yêu cầu nhập giá cho sp";
}
if($priceErr !== ""){
    header("location: " . BASE_URL . "admin/product/add_new.php?priceerr=$priceErr");
    die;
}
if($avatar['size'] <= 0){
    $imgErr = "yêu cầu nhập ảnh"; 
}
if($imgErr != ""){
    header("location: " . BASE_URL . "admin/product/add_new.php?imgerr=$imgErr");
    die;
}

if(!is_int($esp)){
    $espErr="yêu cầu nhập số nguyên";
}
if($espErr != ""){
    header("location: " . BASE_URL . "admin/product/add_new.php?esperr=$espErr");
    die;
}
// var_dump($name);
// die();


// không chứa dấu cách


if($nameErr.$priceErr != ""){
    header("location: " . BASE_URL . "admin/product/add_new.php?nameerr=$nameErr&priceerr=$priceErr");
    die;
}

// 3. Xử lý dữ liệu (bao gồm lưu ảnh)


// 3.1 thực hiện lưu ảnh
if($avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], '../assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
}
$path = 'admin/assets/upload/' . $filename;
// die($path);
// mã hóa mật khẩu

// 4. Tạo câu query để insert data
$insertQuery = "insert into product
(ten_hh , don_gia, giam_gia, hinh  , ngay_nhap , mo_ta , so_luot_xem , ma_loai , dac_biet)
values 
('$name' ,'$price' , '$sale' ,'$path', '$date' , '$des'  , 0 , '$type' ,'$esp')";

// var_dump($insertQuery);
// die();

// 5. Thực thi câu query với csdl
$connect = getDbConnect();
$stmt = $connect->prepare($insertQuery); // nạp câu sql query vào trong kết nối
$stmt->execute(); // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
    // var_dump($stmt);
    // die();
header("location: " . BASE_URL . "admin/listProduct.php");

?>