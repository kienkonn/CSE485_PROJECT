<?php
require_once APP_ROOT . '/models/News.php';
class HomeController {
    // Trang chính
    public function index() {
        // Lấy danh sách tin tức từ model News
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();  

        include APP_ROOT . '/views/home/index.php';
    }

    // Hiển thị chi tiết tin tức
    public function detail() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Lấy thông tin tin tức theo ID
            $newsModel = new News();
            $news = $newsModel->getNewsById($id);

            if ($news) {
                include APP_ROOT . '/views/news/detail.php';
            } else {
                header('Location: index.php?controller=home&action=index');
            }
        } else {
            header('Location: index.php?controller=home&action=index');
        }
    }
    
    // Tìm kiếm tin tức
    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keyword = $_POST['keyword'];

            // Tìm kiếm tin tức theo từ khóa
            $newsModel = new News();
            $newsList = $newsModel->searchNews($keyword);

            include APP_ROOT . '/views/home/search.php';
        } else {
            // Nếu không phải là POST, chuyển hướng về trang chủ
            header('Location: index.php');
        }
    }
}
?>
