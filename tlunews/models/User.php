<?php
require_once APP_ROOT . '/models/database.php';

class User {
    private $id;
    private $username;
    private $password;
    private $role;
    private $db;

    public function __construct($id = null, $username = null, $password = null, $role = null) {
        $this->db = Database::getConnection();
        if ($id !== null) {
            $this->id = $id;
        }
        if ($username !== null) {
            $this->username = $username;
        }
        if ($password !== null) {
            $this->password = $password;
        }
        if ($role !== null) {
            $this->role = $role;
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    // Đăng nhập
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            return new self($row['id'], $row['username'], $row['password'], $row['role']);
        }
        return null;
    }

    // Đăng ký
    public function register($username, $password, $role = 0) {
        if ($this->usernameExists($username)) {
            return false;
        }

        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Check trùng
    public function usernameExists($username) {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
?>
