<?php
// Hàm trả về kết nối với csdl
function getDbConnect(){
    $host = "127.0.0.1";
    $dbname = "xshop";
    $dbusername = "root";
    $dbpass = "";
    return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
                                        $dbusername, $dbpass);
}

?>