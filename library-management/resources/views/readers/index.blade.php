@extends('layouts.app')

@section('title', 'Danh Sách Độc Giả')

@section('content')
<div class="container">
  <h1 class="mb-4">Danh Sách Độc Giả</h1>
  <a href="{{ route('readers.create') }}" class="btn btn-success mb-3">Thêm Độc Giả Mới</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Ngày Sinh</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($readers as $reader)
        <tr>
          <td>{{ $reader->id }}</td>
          <td>{{ $reader->name }}</td>
          <td>{{ $reader->birthday }}</td>
          <td>{{ $reader->address }}</td>
          <td>{{ $reader->phone }}</td>
          <td>
            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-primary btn-sm">Sửa</a>
            <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display:inline-block;">
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