<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// Hiển thị danh sách sản phẩm
public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}

// Hiển thị form thêm mới sản phẩm
public function create()
{
    return view('products.create');
}

// Lưu sản phẩm mới
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    Product::create($request->all());

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

// Hiển thị form chỉnh sửa sản phẩm
public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

// Cập nhật thông tin sản phẩm
public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $product->update($request->all());

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

// Xóa sản phẩm
public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}
}
