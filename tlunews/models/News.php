<?php
require_once APP_ROOT . '/models/database.php';

class News {
    private $id;
    private $title;
    private $content;
    private $image;
    private $category_id;
    private $db;

    public function __construct($id = null, $title = null, $content = null, $image = null, $category_id = null) {
        $this->db = Database::getConnection();
        if ($id !== null) {
            $this->id = $id;
        }
        if ($title !== null) {
            $this->title = $title;
        }
        if ($content !== null) {
            $this->content = $content;
        }
        if ($image !== null) {
            $this->image = $image;
        }
        if ($category_id !== null) {
            $this->category_id = $category_id;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    // Lấy tất cả các tin tức
    public function getAllNews() {
        $query = "SELECT * FROM news";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $newsList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $newsList[] = new self($row['id'], $row['title'], $row['content'], $row['image'], $row['category_id']);
        }
        return $newsList;
    }


    // Lấy tin tức theo ID
    public function getNewsById($id) {
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new self($row['id'], $row['title'], $row['content'], $row['image'], $row['category_id']);
        }
        return null;  // Nếu không tìm thấy tin tức
    }

    
    // Tìm kiếm tin tức
    public function searchNews($keyword) {
        $query = "SELECT * FROM news WHERE title LIKE :keyword OR content LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $newsList = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $newsList[] = new self($row['id'], $row['title'], $row['content'], $row['image'], $row['category_id']);
        }

        return $newsList;
    }
    // Lấy tên thể loại
    public function getCategoryName() {
        $query = "SELECT name FROM categories WHERE id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['name'] : 'Chưa có danh mục';
    }
}
?>
