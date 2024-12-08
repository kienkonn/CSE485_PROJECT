<?php
include_once 'D:/laragon/www/Lab2/tlunews/config/database.php';
include_once __DIR__ . '/../../../controllers/NewsController.php';
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
} else {
    header('Location: index.php');
    exit();
}
$newsController = new NewsController();
$news = $newsController->getNewsById($newsId);

if (!$news) {
    echo "Tin tức không tồn tại.";
    exit();
}

// Nếu form đã được submit, xử lý cập nhật thông tin
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $created_at = $_POST['created_at'];

    // Cập nhật tin tức
    $newsController->updateNews($newsId, $title, $category_id, $created_at);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tin tức</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa tin tức</h1>

        <form action="edit.php?id=<?php echo $news['id']; ?>" method="POST">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $news['title']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <?php 
                    $categories = $newsController->getCategories();
                    foreach ($categories as $category):
                    ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo $news['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="created_at">Ngày tạo</label>
                <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($news['created_at'])); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>
