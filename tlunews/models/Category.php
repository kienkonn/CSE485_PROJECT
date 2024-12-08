<?php
require_once APP_ROOT . '/models/database.php';

class Category {
    private $id;
    private $name;
    private $db;

    public function __construct($id = null, $name = null) {
        $this->db = Database::getConnection();
        if ($id !== null) {
            $this->id = $id;
        }
        if ($name !== null) {
            $this->name = $name;
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
?>
