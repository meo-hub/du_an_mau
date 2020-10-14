<?php

require_once "../../lib/db.php";
require_once "../../lib/common.php";

// lấy id trên đường dẫn xuống
$userId = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra xem id có tồn tại trong db hay không 
$connect = getDbConnect();
$getUserByIdQuery = "select * from product_type where id_product_type = $userId";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();
$user = $stmt->fetch(); 

if(!$user){
    header("location:".BASE_URL."/admin/index.php?msg=user không tồn tại");
    die;
}

// lấy thông tin từ form sau đó validate dữ liệu
$name = trim($_POST['name']);
$nameErr = "";



if(strlen($name) == 0){
    $nameErr = "Hãy nhập họ và tên";
}
// ktra số lượng ký tự
if($nameErr == "" && (strlen($name) < 1 || strlen($name) > 30)){
    $nameErr = "Độ dài họ và tên nằm trong khoảng 1 - 30 ký tự";
}

// var_dump($name , $nameErr);
// die();

if($nameErr != ""){
    header("location://localhost/web204/admin/loai_hang/edit.php?id=$userId&nameerr=$nameErr");
    die();
}
// bằng đường dẫn ảnh đang có trong db


// 3.1 thực hiện lưu ảnh


$updateUserSql = "update product_type 
                    set 
                    name_product_type = '$name'
                        
                  where id_product_type = $userId ";

$stmt = $connect->prepare($updateUserSql);
$stmt->execute();

// var_dump($updateUserSql);
// die();

header("location:". BASE_URL . "admin/listProductType.php?msg=Cập nhật tài khoản thành công");

?>