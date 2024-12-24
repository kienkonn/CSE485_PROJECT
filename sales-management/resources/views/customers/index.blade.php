@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Danh sách khách hàng</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Thêm khách hàng</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoai</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
