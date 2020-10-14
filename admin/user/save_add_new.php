<?php

require_once "../../lib/db.php";
require_once "../../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl

// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

$password = $_POST['password'];
$passwordErr = "";

$email = $_POST['email'];
$emailErr = "";

$address = $_POST['address'];

$image = $_FILES['image'];



if(strlen($name) == 0){
    $nameErr = "Hãy nhập tên sản phẩm";
}
// ktra số lượng ký tự
if($nameErr === "" && (strlen($name) < 2 || strlen($name) > 100)){
    $nameErr = "Độ dài sản phẩm nằm trong khoảng 2 - 100 ký tự";
}
// var_dump($name);
// die();

// không chứa dấu cách
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password < 6) || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
}



// không chứa dấu cách


if($nameErr != ""){
    header("location: " . BASE_URL . "admin/user/add_new.php?nameerr=$nameErr&emailerr=$emailErr&password=$passwordErr");
    die;
}

// 3. Xử lý dữ liệu (bao gồm lưu ảnh)
// $path = "";
// 3.1 thực hiện lưu ảnh
if($image['size']>0){
    $filename = uniqid() . "-" . $image['name'];
    move_uploaded_file($image['tmp_name'], '../assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
    // die($path);
}

// 3.1 thực hiện lưu ảnh

// mã hóa mật khẩu

$hashPassword = password_hash($password, PASSWORD_DEFAULT);


// var_dump($hashPassword);
// die();
// 4. Tạo câu query để insert data

$insertQuery = "insert into users
(name , password , image , email , address , role , active)
values 
('$name', '$hashPassword' , '$path' , '$email' , '$address' , 0 , 1 )";


// var_dump($insertQuery);
// die();

                    // 5. Thực thi câu query với csdl
$connect = getDbConnect();
$stmt = $connect->prepare($insertQuery); // nạp câu sql query vào trong kết nối
$stmt->execute(); // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
// var_dump($insertQuery);
// die();
header("location: " . BASE_URL . "admin/listUser.php");



?>