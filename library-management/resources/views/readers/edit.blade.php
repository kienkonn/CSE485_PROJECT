@extends('layouts.app')

@section('title', 'Sửa Thông Tin Độc Giả')

@section('content')
<div class="container">
  <h1>Sửa Thông Tin Độc Giả</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('readers.update', $reader->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Tên Độc Giả</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $reader->name) }}" required>
    </div>
    <div class="mb-3">
      <label for="birthday" class="form-label">Ngày Sinh</label>
      <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $reader->birthday) }}" required>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Địa Chỉ</label>
      <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $reader->address) }}" required>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Số Điện Thoại</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $reader->phone) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin Độc Giả</button>
  </form>
</div>
@endsection