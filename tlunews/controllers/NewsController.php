<?php
require_once APP_ROOT . '/models/News.php';
require_once APP_ROOT . '/models/Category.php'; 

class NewsController {

    // Thêm tin tức mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận dữ liệu từ form
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image']; 
            $categoryId = $_POST['category_id'];

            // Thêm tin tức mới
            $newsModel = new News();
            if ($newsModel->addNews($title, $content, $image, $categoryId)) {
                header('Location: index.php?controller=news&action=index');
            } else {
                $error = 'Lỗi khi thêm tin tức';
                include APP_ROOT . '/views/admin/news/add.php';
            }
        } else {
            $categoryModel = new Category(); 
            $categories = $categoryModel->getAllCategories(); 
            include APP_ROOT . '/views/admin/news/add.php';
        }
    }

    // Cập nhật tin tức
    public function edit($id) {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $categoryId = $_POST['category_id'];

            // Cập nhật tin tức
            if ($newsModel->updateNews($id, $title, $content, $image, $categoryId)) {
                header('Location: index.php?controller=news&action=index');
            } else {
                $error = 'Lỗi khi cập nhật tin tức';
                include APP_ROOT . '/views/admin/news/edit.php';
            }
        } else {
            // Hiển thị form chỉnh sửa tin tức
            $categoryModel = new Category(); 
            $categories = $categoryModel->getAllCategories(); // Lấy danh sách danh mục
            include APP_ROOT . '/views/admin/news/edit.php';
        }
    }

    // Xóa tin tức
    public function delete($id) {
        // Xóa tin tức theo ID
        $newsModel = new News();
        if ($newsModel->deleteNews($id)) {
            header('Location: index.php?controller=news&action=index');
        } else {
            $error = 'Lỗi khi xóa tin tức';
            include APP_ROOT . '/views/admin/news/index.php';
        }
    }
}
?>
