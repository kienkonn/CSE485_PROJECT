<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tin Tức</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Quản Lý Tin Tức</h1>
        <a href="index.php?controller=news&action=add" class="btn btn-success mb-3">Thêm Tin Tức</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Kiểm tra nếu $newsList không rỗng trước khi lặp -->
                <?php if (!empty($newsList)): ?>
                    <?php foreach ($newsList as $news): ?>
                        <tr>
                            <td><?= htmlspecialchars($news->getId()) ?></td> 
                            <td><?= htmlspecialchars($news->getTitle()) ?></td>
                            <td><img src="uploads/<?= htmlspecialchars($news->getImage()) ?>" alt="Image" width="100"></td>
                            <td><?= htmlspecialchars($news->getCategoryName()) ?></td>
                            <td>
                                <a href="index.php?controller=news&action=edit&id=<?= $news->getId() ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?controller=news&action=delete&id=<?= $news->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có tin tức nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
