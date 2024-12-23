<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Quản Lý Thư Viện')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 60px;
    }
    .navbar {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/books') }}">Quản Lý Thư Viện</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">Sách</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('readers.index') }}">Độc Giả</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('borrows.index') }}">Phiếu Mượn</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @if (session('success'))
      <div class="alert alert-success mt-4">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>