@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách sách</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm sách</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Năm xuất bản</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->quantity }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection