<?php
session_start();
require_once './lib/common.php';
require_once './lib/db.php';

$checkEmail = "select * from users where email = '$email'";


$passworderr = "";
$emailerror = "";

$email = isset($_POST['email']) ? $_POST['email'] : "";

$password = isset($_POST['password']) ? $_POST['password'] : "";

// validate
if($checkEmail > 0){
    header('location: ' . BASE_URL . 'login.php?emailerr=email đã tồn tại , mời nhập email khác');
    die();
}



if ($email == ""){
    $emailerror = 'Bạn chưa email';
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerror = 'Email không đúng định dạng';
}

if ($password == ""){
    $passworderr = 'Bạn chưa điền mật khẩu';
}
$error = $passworderr .''.$emailerror;

if($error != ""){
    header('location: ' . BASE_URL . 'login.php?passworderror='.$passworderr);
    die();
}

// lấy user dựa vào email
$getUserByEmailQuery = "select * from users where email = '$email'";
$connect = getDbConnect();
$stmt = $connect->prepare($getUserByEmailQuery);
$stmt->execute();
$user = $stmt->fetch();

// var_dump($getUserByEmailQuery); die();
// kiểm tra xem có user hay không

// print_r($user['password']);

// print_r($password);
// die();
//echo password_verify($password, $user['password']);
// nếu có thì so sánh mk nhập vào với mk trong db xem có khớp không
if($user && password_verify($password, $user['password'])){
    $_SESSION['users'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'image' => $user['image'],
        'address' => $user['address'],
        'role' => $user['role'],
        'active' => $user['active']
    ];
    header('location: ' . BASE_URL . '?msg=đăng nhập thành công');
    die();
}else{
    echo "sai tk mk roi";
}


?>