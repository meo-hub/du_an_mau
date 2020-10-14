<?php

require_once "lib/db.php";
require_once "lib/common.php";


// lấy id trên đường dẫn xuống
$userId = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra xem id có tồn tại trong db hay không 
$connect = getDbConnect();
$getUserByIdQuery = "select * from users where id = $userId";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();
$user = $stmt->fetch(); 

if(!$user){
    header("location:".BASE_URL."/admin/index.php?msg=Người dùng không tồn tại không tồn tại");
    die;
}

// lấy thông tin từ form sau đó validate dữ liệu
$name = trim($_POST['name']);
$nameErr = "";

$avatar = $_FILES['image'];

$email = $_POST['email'];

$address = $_POST['address'];

$path = "";



if(strlen($name) == 0){
    $nameErr = "Hãy nhập họ và tên";
}
// ktra số lượng ký tự
if($nameErr == "" && (strlen($name) < 4 || strlen($name) > 30)){
    $nameErr = "Độ dài họ và tên nằm trong khoảng 4 - 30 ký tự";
}

// var_dump($name , $nameErr);
// die();

if($nameErr != ""){
    header("location://localhost/web204/admin/loai_hang/edit.php?id=$userId&nameerr=$nameErr&saivl");
    die();
}
// bằng đường dẫn ảnh đang có trong db
$path = $user['image'];




// 3.1 thực hiện lưu ảnh
if($avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], 'admin/assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
}

$updateUserSql = "update users 
                    set 
                        name = '$name' , 
                        image = '$path ' , 
                        email = '$email' ,
                        address = '$address'
                        where id = $userId ";

$stmt = $connect->prepare($updateUserSql);
$stmt->execute();

// var_dump($updateUserSql);
// die();

header("location:". BASE_URL . "admin/listUser.php?msg=Cập nhật tài khoản thành công");

?>