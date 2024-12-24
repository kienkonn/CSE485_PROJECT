@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Chi tiết đơn hàng</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Đặt hàng</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->order->id }}</td>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>
                            <a href="{{ route('order_details.edit', $orderDetail->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('order_details.destroy', $orderDetail->id) }}" method="POST" class="d-inline">
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
