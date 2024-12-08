<?php
require_once APP_ROOT . '/models/User.php';
require_once APP_ROOT . '/config/config.php'; 
require_once APP_ROOT . '/models/News.php';
require_once APP_ROOT . '/models/Category.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $admin = $userModel->login($username, $password);

            if ($admin && $admin->getRole() == 1) {
                session_start();
                $_SESSION['admin'] = [
                    'id' => $admin->getId(),
                    'username' => $admin->getUsername(),
                    'role' => $admin->getRole()
                ];
                header('Location: index.php?controller=admin&action=dashboard');
            } else {
                $error = 'Invalid login credentials or not an admin!';
                include APP_ROOT . '/views/admin/login.php';
            }
        } else {
            include APP_ROOT . '/views/admin/login.php';
        }
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=admin&action=login');
        }

        include APP_ROOT . '/views/admin/dashboard.php';
    }

    public function detail($id) {
        $newsModel = new News();
        $news = $newsModel->getAllNews();

        // Kiểm tra xem tin tức có tồn tại không
        if ($news) {
            include APP_ROOT . '/views/admin/news/index.php';
        } else {
            header('Location: index.php?controller=admin&action=dashboard');
        }
    }
    //Thông tin danh mục tin tức
    public function index() {
        $newsModel = new News();  
        $newsList = $newsModel->getAllNews(); 
        require_once 'views/admin/news/index.php'; 
    }
    //Thông tin danh mục thể loại
    public function indexcategory() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();
        
        require_once 'views/admin/category/index.php';
    }
}
?>
