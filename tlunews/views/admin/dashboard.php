<?php
// Kiểm tra nếu người dùng chưa đăng nhập thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chào mừng đến với trang quản trị!</h1>
        <a href="../controllers/AdminController.php?logout=true" class="btn btn-danger">Đăng xuất</a>
    </div>
</body>
</html>
