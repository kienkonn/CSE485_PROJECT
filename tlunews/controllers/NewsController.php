<?php
require_once APP_ROOT . '/models/News.php';
require_once APP_ROOT . '/models/Category.php'; 

class NewsController {

    // Hiển thị danh sách tất cả tin tức
    public function index() {
        // Lấy tất cả các tin tức từ model News
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();

        // Gửi danh sách tin tức tới view
        include APP_ROOT . '/views/home/index.php';
    }

    // Xem chi tiết một tin tức
    public function view($id) {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        if ($news !== null) {
            // Nếu tin tức tồn tại, hiển thị chi tiết
            include APP_ROOT . '/views/news/detail.php';
        } else {
            header('Location: index.php?controller=news&action=index');
        }
    }
}
?>
