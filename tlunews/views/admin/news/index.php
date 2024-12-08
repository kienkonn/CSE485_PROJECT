<?php
include_once 'D:/laragon/www/Lab2/tlunews/config/database.php';
include_once __DIR__ . '/../../../controllers/NewsController.php';

$newsController = new NewsController();
$newsList = $newsController->getAllNews();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Quản lý tin tức</h1>

        <a href="add.php" class="btn btn-primary mb-3">Thêm mới tin tức</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo $news['title']; ?></td>
                        <td><?php echo $news['category_name']; ?></td>
                        <td><?php echo $news['created_at']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete.php?id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
