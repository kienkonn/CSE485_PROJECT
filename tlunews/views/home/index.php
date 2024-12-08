
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=home&action=index">Trang Chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=admin&action=login">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Danh Sách Tin Tức</h1>
        <form class="my-4" action="index.php" method="GET">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="search">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tin tức...">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="row">
            <?php foreach ($newsList as $news): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="uploads/<?= htmlspecialchars($news->getImage()) ?>" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($news->getTitle()) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(substr($news->getContent(), 0, 100)) ?>...</p>
                            <a href="index.php?controller=home&action=detail&id=<?= $news->getId() ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
