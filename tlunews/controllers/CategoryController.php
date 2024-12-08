<?php
include_once __DIR__ . '/../models/Category.php';

class CategoryController {

    public function getAllCategories() {
        $categoryModel = new Category();
        return $categoryModel->getAllCategories();
    }

    public function getCategoryById($id) {
        $categoryModel = new Category();
        return $categoryModel->getCategoryById($id);
    }
}
