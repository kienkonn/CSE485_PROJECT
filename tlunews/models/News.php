<?php
require_once APP_ROOT . '/models/database.php';

class News {
    private $id;
    private $title;
    private $content;
    private $image;
    private $category_id;
    private $db;

    // Khởi tạo đối tượng News
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

    // Getter và setter
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
        
    }
    // Lấy tin tức theo ID
    public function getNewsById($id) {
        
    }
    // Thêm tin tức mới
    public function addNews($title, $content, $image, $category_id) {
        $query = "INSERT INTO news (title, content, image, category_id) VALUES (:title, :content, :image, :category_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    // Cập nhật tin tức
    public function updateNews($id, $title, $content, $image, $category_id) {
        $query = "UPDATE news SET title = :title, content = :content, image = :image, category_id = :category_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    // Xóa tin tức
    public function deleteNews($id) {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function searchNews($keyword) {
 
    }
}
?>
