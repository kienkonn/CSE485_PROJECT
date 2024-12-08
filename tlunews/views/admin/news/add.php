<?php
// Bao gồm controller để lấy danh sách danh mục
include_once __DIR__ . '/../../../controllers/CategoryController.php';
$categoryController = new CategoryController();
$categories = $categoryController->getAllCategories();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm tin tức mới</h1>
        
        <!-- Form Thêm tin tức -->
        <form action="add_action.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Danh mục:</label>
                <select name="category" id="category" class="form-control" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Lưu tin tức</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
