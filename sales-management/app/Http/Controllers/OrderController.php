<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer', 'orderDetails.product')->get();
        return view('orders.index', compact('orders'));
    }

    // Hiển thị form tạo đơn hàng
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    // Lưu đơn hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|boolean',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        $order->orderDetails()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Xem chi tiết đơn hàng
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    // Xóa đơn hàng
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
