<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_detail;

class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Tạo mới chi tiết đơn hàng
        Order_detail::create($request->all());

        return redirect()->route('orders.show', $request->order_id)
            ->with('success', 'Order details added successfully.');
    }

    // Cập nhật chi tiết đơn hàng
    public function update(Request $request, Order_detail $orderDetail)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Cập nhật chi tiết đơn hàng
        $orderDetail->update($request->all());

        return redirect()->route('orders.show', $orderDetail->order_id)
            ->with('success', 'Order details updated successfully.');
    }

    // Xóa chi tiết đơn hàng
    public function destroy(Order_detail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('orders.show', $orderDetail->order_id)
            ->with('success', 'Order details deleted successfully.');
    }
}
