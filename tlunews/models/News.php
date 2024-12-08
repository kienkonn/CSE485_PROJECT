<?php
class News {

    public function getAllNews() {
        $sql = "SELECT n.id, n.title, n.content, c.name as category_name, n.created_at
                FROM news n
                JOIN categories c ON n.category_id = c.id";
        return [];
    }

    public function getNewsById($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        // Truy vấn và trả về tin tức
        return [];
    }

    public function addNews($title, $category, $content, $image) {
    }

    public function editNews($id, $title, $category, $content, $image) {
    }
}
