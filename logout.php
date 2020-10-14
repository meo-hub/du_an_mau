<?php
session_start();
require_once './lib/common.php';

unset($_SESSION['users']);
header("location: " . BASE_URL);

?>