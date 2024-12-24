@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Chi tiết đơn hàng</h2>
        <div class="mb-3">
            <strong>Tên khách hàng: </strong> {{ $order->customer->name }}
        </div>
        <div class="mb-3">
            <strong>Ngày đặt hàng: </strong> {{ $order->order_date }}
        </div>
        <div class="mb-3">
            <strong>Status: </strong> 
            @if($order->status)
                <span class="badge bg-success">Hoàn thành</span>
            @else
                <span class="badge bg-warning">Chưa hoàn thành</span>
            @endif
        </div>

        <h3>Sản phẩm trong đơn hàng</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ number_format($orderDetail->product->price, 2) }}</td>
                        <td>{{ number_format($orderDetail->quantity * $orderDetail->product->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
