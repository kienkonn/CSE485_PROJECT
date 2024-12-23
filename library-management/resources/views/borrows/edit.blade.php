@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Cập nhật thông tin phiếu mượn</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="reader_id" class="form-label">Độc giả</label>
            <select name="reader_id" id="reader_id" class="form-select" required>
                <option value="">-- Chọn độc giả --</option>
                @foreach ($readers as $reader)
                    <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                        {{ $reader->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Sách</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Chọn sách --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Ngày trả dự kiến</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-select">
                <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Đang mượn</option>
                <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Đã trả</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
