<?php



require_once "../../lib/db.php";
require_once "../../lib/common.php";

// lấy id trên đường dẫn xuống
$userId = isset($_GET['id']) ? $_GET['id'] : -1;

$connect = getDbConnect();
$getUserByIdQuery = "delete from product where ma_hh = $userId";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();

// var_dump($getUserByIdQuery) ;
// die();

header("location:". BASE_URL ."admin/listProduct.php?msg=Xóa tài khoản thành công");

?>