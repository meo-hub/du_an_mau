<?php

require_once "../../lib/db.php";
require_once "../../lib/common.php";

// lấy id trên đường dẫn xuống
$id_hh = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra xem id có tồn tại trong db hay không 

$connect = getDbConnect();
$getUserByIdQuery = "select * from product where ma_hh = $id_hh";
$stmt = $connect->prepare($getUserByIdQuery);
$stmt->execute();
$user = $stmt->fetch();


if (!$user) {
    header("location:" . BASE_URL . "admin/index.php?msg=món hàng không tồn tại");
    die;
}

// lấy thông tin từ form sau đó validate dữ liệu
$name = trim($_POST['name']);
$nameErr = "";

$avatar = $_FILES['image'];
$path = "";

$price = $_POST['price'];
$priceErr = "";

$sale = $_POST['sale'];
$saleErr = $_POST['sale'];

$date = $_POST['date'];

$des = $_POST['description'];

$es = $_POST['especially'];

$type = $_POST['type'];




if (strlen($name) == 0) {
    $nameErr = "Hãy nhập tên sản phẩm";
}
// ktra số lượng ký tự
if ($nameErr == "" && (strlen($name) < 1 || strlen($name) > 50)) {
    $nameErr = "Độ dài sản phẩm nằm trong khoảng 1 - 50 ký tự";
}

// var_dump($name , $nameErr);
// die();

if ($nameErr != "") {
    header("location:" . BASE_URL . "admin/edit.php?id=$id_hh&nameerr=$nameErr");
    die();
}
// bằng đường dẫn ảnh đang có trong db
$path = $user['hinh'];

// 3.1 thực hiện lưu ảnh
if ($avatar['size'] > 0) {
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], '../assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
}

$updateUserSql = "update product 
                    set 
                    ten_hh = '$name', 
                    hinh = '$path' , 
                    don_gia = '$price',
                    giam_gia = '$sale',
                    ngay_nhap = '$date',
                    mo_ta = '$des',  
                    dac_biet = '$es', 
                    ma_loai = '$type'
                    where ma_hh = $id_hh";

$stmt = $connect->prepare($updateUserSql);
$stmt->execute();

// var_dump($updateUserSql);
// die();

header("location:" . BASE_URL . "admin/listProduct.php?msg=Cập nhật tài khoản thành công");
