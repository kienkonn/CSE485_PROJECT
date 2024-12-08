<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Quản Lý Danh Mục</h1>
        
        <a href="index.php?controller=admin&action=add" class="btn btn-success mb-3">Thêm Danh Mục</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($categories) && count($categories) > 0): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= htmlspecialchars($category->getId()) ?></td>
                            <td><?= htmlspecialchars($category->getName()) ?></td> 
                            <td>
                                <!-- Sửa và Xóa -->
                                <a href="index.php?controller=admin&action=edit&id=<?= $category->getId() ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?controller=admin&action=delete&id=<?= $category->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không có danh mục nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
