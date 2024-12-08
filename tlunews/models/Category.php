<?php
class Category {


    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        return [];
    }

    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        return [];
    }
}
