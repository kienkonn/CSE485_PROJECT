@extends('layouts.app')

@section('title', 'Danh Sách Phiếu Mượn')

@section('content')
<div class="container">
  <h1 class="mb-4">Danh Sách Phiếu Mượn</h1>
  <a href="{{ route('borrows.create') }}" class="btn btn-success mb-3">Thêm Phiếu Mượn Mới</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Độc Giả</th>
        <th>Sách</th>
        <th>Ngày Mượn</th>
        <th>Ngày Trả</th>
        <th>Trạng Thái</th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($borrows as $borrow)
        <tr>
          <td>{{ $borrow->id }}</td>
          <td>{{ $borrow->reader->name }}</td>
          <td>{{ $borrow->book->name }}</td>
          <td>{{ $borrow->borrow_date }}</td>
          <td>{{ $borrow->return_date }}</td>
          <td>{{ $borrow->status ? 'Đã trả' : 'Đang mượn' }}</td>
          <td>
            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-primary btn-sm">Sửa</a>
            <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection