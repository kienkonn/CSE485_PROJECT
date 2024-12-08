<?php
session_start();

include_once 'config/database.php';
include_once 'controllers/AdminController.php';

$adminController = new AdminController($pdo);

// Kiểm tra xem người dùng yêu cầu đăng nhập hay đăng xuất
if (isset($_GET['logout'])) {
    $adminController->logout();
    exit;
}

// Kiểm tra xem người dùng yêu cầu đăng nhập hay không
if ($_SERVER['REQUEST_URI'] == '/login.php') {
    $adminController->login();
} else {
    include 'views/home/index.php';
}
?>
