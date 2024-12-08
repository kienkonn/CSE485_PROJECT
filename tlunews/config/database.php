<?php
$host = 'localhost';
$dbname = 'tintuc';
$username = 'root';
$password = '1234';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("SET NAMES 'utf8'");
    
} catch (PDOException $e) {
    echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
}
?>
