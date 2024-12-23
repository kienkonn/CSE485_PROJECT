@extends('layouts.app')

@section('title', 'Thêm Độc Giả Mới')

@section('content')
<div class="container">
  <h1 class="mb-4">Thêm Độc Giả Mới</h1>
  <form action="{{ route('readers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Tên</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="birthday" class="form-label">Ngày Sinh</label>
      <input type="date" class="form-control" id="birthday" name="birthday" required>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Địa Chỉ</label>
      <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Số Điện Thoại</label>
      <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm Độc Giả</button>
  </form>
</div>
@endsection