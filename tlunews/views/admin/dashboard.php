
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=admin&action=dashboard">Trang Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=news&action=index">Quản lý tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=admin&action=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Danh mục quản lý</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý tin tức</h5>
                        <p class="card-text">Thêm, sửa, xóa và quản lý danh sách tin tức.</p>
                        <a href="index.php?controller=admin&action=index" class="btn btn-light">Quản lý</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý danh mục</h5>
                        <p class="card-text">Thêm, sửa, xóa các danh mục tin tức.</p>
                        <a href="index.php?controller=admin&action=indexcategory" class="btn btn-light">Quản lý</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Đăng xuất</h5>
                        <p class="card-text">Thoát khỏi bảng điều khiển quản trị viên.</p>
                        <a href="index.php?controller=admin&action=logout" class="btn btn-light">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
