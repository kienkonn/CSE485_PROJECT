<?php
include_once __DIR__ . '/../config/database.php';

class NewsController {
    public function getAllNews() {
        global $pdo;

        $sql = "SELECT news.id, news.title, news.created_at, categories.name AS category_name
                FROM news
                INNER JOIN categories ON news.category_id = categories.id";

        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        global $pdo;

        $sql = "SELECT news.id, news.title, news.created_at, news.category_id, categories.name AS category_name
                FROM news
                INNER JOIN categories ON news.category_id = categories.id
                WHERE news.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getCategories() {
        global $pdo;
        $sql = "SELECT * FROM categories";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateNews($id, $title, $category_id, $created_at) {
        global $pdo;
        $sql = "UPDATE news SET title = :title, category_id = :category_id, created_at = :created_at WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
