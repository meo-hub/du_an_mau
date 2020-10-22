<?php
session_start();
require_once "../lib/db.php";
require_once "../lib/common.php";

checkAuth();

$old_password = $_POST['nowPass'];
$password = $_POST['newPass'];
$cfpassword = $_POST['cfNewPass'];

// validate

// ktra mk cũ có khớp với mk trong db hay không
$getUserById = "select * from users where id = " . $_SESSION['users']['id'];

$connect = getDbConnect();
$stmt = $connect->prepare($getUserById);
$stmt->execute();
$user = $stmt->fetch(); 

// var_dump($user);
// die();

if(!password_verify($old_password, $user['password'])){
    header('location: ' . BASE_URL . 'change_Password.php?msg=Mật khẩu cũ không đúng');
    die;
}
// mã hóa mk mới
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
// cập nhật tài khoản với mk = mk mới đã đc mã hóa
$updateUserPasswordQuery = "update users
                            set 
                                password = '$passwordHash'
                            where id = " . $_SESSION['users']['id'];
$stmt = $connect->prepare($updateUserPasswordQuery);
$stmt->execute();
// điều hướng website sang trang chủ
header('location: ' . BASE_URL . '?đổi mật khẩu thành công' );





?>