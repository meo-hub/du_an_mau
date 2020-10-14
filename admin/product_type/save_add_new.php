<?php

require_once "../../lib/db.php";
require_once "../../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl

// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

if(strlen($name) == 0){
    $nameErr = "Hãy nhập tên sản phẩm";
}
// ktra số lượng ký tự
if($nameErr == "" && (strlen($name) < 2 || strlen($name) > 100)){
    $nameErr = "Độ dài sản phẩm nằm trong khoảng 2 - 100 ký tự";
}
// var_dump($name);
// die();


// không chứa dấu cách


if($nameErr != ""){
    header("location: " . BASE_URL . "admin/add_new.php?nameerr=$nameErr");
    die;
}
// 3. Xử lý dữ liệu (bao gồm lưu ảnh)


// 3.1 thực hiện lưu ảnh

// mã hóa mật khẩu

// 4. Tạo câu query để insert data
$insertQuery = "insert into product_type
(name_product_type)
values 
('$name')";

                    // 5. Thực thi câu query với csdl
$connect = getDbConnect();
$stmt = $connect->prepare($insertQuery); // nạp câu sql query vào trong kết nối
$stmt->execute(); // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
// var_dump($insertQuery);
// die();
header("location: " . BASE_URL . "admin/listProductType.php");



?>