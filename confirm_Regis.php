<?php

require_once "./lib/db.php";
require_once "./lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl
// checkAuth();


// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

$email = $_POST['email'];
$emailErr = "";


$password = $_POST['password'];
$passwordErr = "";

$cfpassword= $_POST['cfpassword'];
$cfpasswordErr = "";

$avatar = $_FILES['image'];

// var_dump($avatar);
// die();

$address = $_POST['address'];

// $checkEmail = "select * from users where email = '$email'";


// var_dump($checkEmail);
// die();
$emailCheck = checkEmail($email);
// $check = mysql_fetch_row($emailCheck);

// var_dump($emailCheck);
// die();

if($emailCheck){
    header('location: ' . BASE_URL . 'registration.php?emailerr=email đã tồn tại , mời nhập email khác');
    die();
}

if(strlen($name) == 0){
    $nameErr = "Hãy nhập tên người dùng";
}
// ktra số lượng ký tự
if($nameErr == "" && (strlen($name) < 5 || strlen($name) > 100)){
    $nameErr = "Độ dài họ tên nằm trong khoảng 5 - 100 ký tự";
}
// var_dump($name);
// die();

if($password != $cfpassword){
    $cfpasswordErr = "Mật khẩu không trùng nhau!";

}

// không chứa dấu cách
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password < 6) || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
}



// không chứa dấu cách


if($nameErr.$emailErr.$passwordErr.$cfpasswordErr != ""){
    header("location: " . BASE_URL . "confirm_Regis.php?nameerr=$nameErr&emailerr=$emailErr&password=$passwordErr&cfpassword=$cfpasswordErr");
    die();
}

// 3. Xử lý dữ liệu (bao gồm lưu ảnh)
$path = "";
// 3.1 thực hiện lưu ảnh
if($avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], '../assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
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
header("location: " . BASE_URL . "login.php");



?>