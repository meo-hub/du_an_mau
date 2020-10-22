<?php

require_once "../lib/db.php";
require_once "../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl



// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Email không đúng định dạng";
}


$password = $_POST['password'];
$passwordErr = "";

$cfpassword= $_POST['cfpassword'];
$cfpasswordErr = "";

$avatar = $_FILES['image'];

$birthDate = $_POST['birthDate'];
$birthErr = '';
// var_dump($avatar);
// die();

$address = $_POST['address'];

//kiem tra su ton tai cua email
    $sqlcheck = "select * from users where email = '$email'";
    $connect = getDbConnect();
    $stmt = $connect->prepare($sqlcheck);
    $stmt->execute();
    $emailchecking = $stmt->fetchAll();
    var_dump($emailchecking);
    die();
   

    if($emailchecking == $email){
        $emailErr = "email đã tồn tại!";
        header("location:" . BASE_URL . "registration.php?emailerr=$emailErr");
        die();
    }


if($name == ""){
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


if($nameErr.$emailErr.$passwordErr.$cfpasswordErr != ""){
    header("location: " . BASE_URL . "registration.php?nameerr=$nameErr&emailerr=$emailErr&password=$passwordErr&cfpassword=$cfpasswordErr");
    die();
}

// 3. Xử lý dữ liệu (bao gồm lưu ảnh)
$path = "";
// 3.1 thực hiện lưu ảnh
if($avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], 'admin/assets/upload/' . $filename);
    $path = 'admin/assets/upload/' . $filename;
}

// 3.1 thực hiện lưu ảnh

// mã hóa mật khẩu

$hashPassword = password_hash($password, PASSWORD_DEFAULT);


// var_dump($hashPassword);
// die();
// 4. Tạo câu query để insert data

$insertQuery = "insert into users
(name , password , image , email , address , role , active, birth_date)
values 
('$name', '$hashPassword' , '$path' , '$email' , '$address' , 0 , 1, $birthDate)";


// var_dump($insertQuery);
// die();

                    // 5. Thực thi câu query với csdl
$connect = getDbConnect();
$stmt = $connect->prepare($insertQuery); // nạp câu sql query vào trong kết nối

// var_dump($stmt->execute());
// die();
$stmt->execute();
 // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
// var_dump($insertQuery);
// die();
header("location: " . BASE_URL . "login.php");



?>