<?php
define("BASE_URL", "http://localhost:8080/php/du_an_web204/");

function datetimeConvert($datetimeData, $formatString = "d/m/Y")
{
    $date = new DateTime($datetimeData);
    return $date->format($formatString);
}

function checkAuth()
{
    if (!isset($_SESSION['users'])) {
        header('location:' . BASE_URL . 'login.php');
        die();
    }
}

function checkRole()
{

    if ($_SESSION['users']['role'] == 0 & $_SESSION['users']['active'] == 1) {
        header('location:' . BASE_URL . 'index.php?mgs=Bankhongphaiadmin');
        die();
    }
}

function adminConnectListAdmin()
{
    $getUserQuery = "select * from users where role = 1 and active = 1";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function adminConnectListUser()
{
    $getUserQuery = "select * from users where role = 0 and active = 1";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function adminConnectListProductType()
{
    $getUserQuery = "select * from product_type";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function adminConnectListProduct()
{
    $getUserQuery = "select * from product";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function adminConnectListComment()
{
    $getUserQuery = "select * from comment";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function connectListComment($ma_hh)
{
    $getUserQuery = "select c.*, u.* from comment c join users u on c.ma_kh = u.id
    
    where c.ma_hh = '$ma_hh' ";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

function checkEmail($email)
{
    $checkEmail = "select * from users where email = '$email'";
    $connect = getDbConnect();
    $stmt = $connect->prepare($checkEmail);
    $stmt->execute();
    $listEmail = $stmt->fetch();
    return $listEmail;
}

function adminConnectLogo()
{
    $getUserQuery = "select * from logo";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getUserQuery);
    $stmt->execute();
    $listUser = $stmt->fetchAll();
    return $listUser;
}

// function pagination()
// {
//     $rowRender = 5;
//     $totalRow = "SELECT COUNT(*) FROM product ";
//     $conn = getDbConnect();
//     $stmt = $conn->prepare($totalRow);
//     $stmt->execute();
//     $listRow = $stmt->fetchColumn();

//     // kết nối và thực thi câu lệnh sql
//     $totlaPage = ceil($listRow / $rowRender);
//     $curenPage = (isset($_GET['page']) ? $_GET['page'] : 1);
//     //die($listRow);
//     if ($curenPage < 1) {
//         $curenPage = 1;
//     }
//     if ($curenPage >= $totlaPage) {
//         $curenPage = $totlaPage;
//     }
//     $start = ($curenPage - 1) * $totlaPage;
//     $sql = "SELECT * FROM product ORDER BY ma_hh LIMIT {$start},{$rowRender}";
//     $connect = getDbConnect();
//     $stmt = $connect->prepare($sql);
//     $stmt->execute();
//     $dataRender = $stmt->fetchAll();


//     $_SESSION['totalPage'] = $totlaPage;
//     $_SESSION['prevPage'] = ($curenPage > 1) ? $curenPage - 1 : $curenPage = 1;
//     $_SESSION['nextPage'] = ($curenPage >= $totlaPage) ? $totlaPage : $curenPage + 1;
//     return $dataRender;
// }

