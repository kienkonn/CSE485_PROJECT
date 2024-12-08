<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($news->getTitle()) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?= htmlspecialchars($news->getTitle()) ?></h1>
        <p><strong>Danh mục:</strong> <?= htmlspecialchars($news->getCategoryName()) ?></p> 
        <img src="uploads/<?= htmlspecialchars($news->getImage()) ?>" class="img-fluid mb-3" alt="Image">
        <p><?= nl2br(htmlspecialchars($news->getContent())) ?></p>
        <a href="index.php?controller=home&action=index" class="btn btn-secondary">Quay lại</a>
    </div>
</body>
</html>
