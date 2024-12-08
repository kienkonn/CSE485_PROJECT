<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Kiểm tra thông tin đăng nhập
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password AND role = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về thông tin người dùng
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['admin']);
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
