<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm Tin Tức</h1>
        <form action="index.php?controller=news&action=add" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <form action="<?= APP_ROOT ?>views/admin/category/add.php " method="POST">
                <div class="mb-3">
                    <label for="image" class="form-label">Đường dẫn hình ảnh</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Nhập đường dẫn hình ảnh" required>
                </div>
            </form>
            <div class="mb-3">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-select" id="category" name="category_id" required>
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->getId() ?>"><?= htmlspecialchars($category->getName()) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="index.php?controller=news&action=index" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
