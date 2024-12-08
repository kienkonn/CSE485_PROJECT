<?php
include_once '../config/db.php';
include_once '../models/User.php';

class AdminController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra đăng nhập
            $admin = $this->userModel->login($username, $password);
            if ($admin) {
                $_SESSION['admin'] = $admin['username']; 
                header("Location: admin/dashboard.php"); 
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu!";
                include '../views/admin/login.php';
            }
        } else {
            include '../views/admin/login.php'; 
        }
    }

    public function logout() {
        session_destroy(); 
        header("Location: index.php");
        exit;
    }
    
}
?>
