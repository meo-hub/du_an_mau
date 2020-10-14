<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";


// checkAuth();
$old_password = $_POST['old_password'];
$old_passwordErr="";
$password = $_POST['password'];
$passwordErr="";
$cfpassword = $_POST['cfpassword'];
$cfpasswordErr="";
// validate

$userId = isset($_GET['id']) ? $_GET['id'] : -1;

$getUserById = "select * from users where id = $userId ";

$connect = getDbConnect();
$stmt = $connect->prepare($getUserById);
$stmt->execute();
$user = $stmt->fetch(); 


$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password < 6) || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
}

// giống với xác nhận mk
if($password != $cfpassword){
    $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
}
if(($password) == 0){
    $passwordErr = "Hãy nhập password";
}

if(($cfpassword) == 0){
    $cfpasswordErr = "Hãy nhập password";
}

if(($old_password) == 0){
    $old_passwordErr = "Hãy nhập password";
}

if($passwordErr.$cfpasswordErr.$old_password != ""){
    header('location: ' . BASE_URL . "change_Password.php?passworderr=$passwordErr&cfpassworderr=$cfpasswordErr&old_passworderr=$old_passwordErr");
    die;
}
// mã hóa mk mới
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
// cập nhật tài khoản với mk = mk mới đã đc mã hóa
$updateUserPasswordQuery = "update users
                            set 
                                password = '$passwordHash'
                            where id = $userId " ;
$stmt = $connect->prepare($updateUserPasswordQuery);
$stmt->execute();
// điều hướng website sang trang chủ
header('location: ' . BASE_URL ."?msg=đổi mk thành công!");
