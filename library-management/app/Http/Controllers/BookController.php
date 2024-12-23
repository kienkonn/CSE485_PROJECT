<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $books = Book::all();
    return view('books.index', compact('books'));
}

public function create()
{
    return view('books.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'author' => 'required',
        'category' => 'required',
        'year' => 'required|integer',
        'quantity' => 'required|integer'
    ]);

    Book::create($request->all());

    return redirect()->route('books.index')
                     ->with('success', 'Thêm sách thành công.');
}

public function edit(Borrow $borrow)
{
    $readers = Reader::all();
    $books = Book::all();

    return view('borrows.edit', compact('borrow', 'readers', 'books'));
}

public function update(Request $request, Borrow $borrow)
{
    $request->validate([
        'reader_id' => 'required|exists:readers,id',
        'book_id' => 'required|exists:books,id',
        'borrow_date' => 'required|date',
        'return_date' => 'required|date',
        'status' => 'required|boolean',
    ]);

    $borrow->update($request->all());

    return redirect()->route('borrows.index')
                     ->with('success', 'Cập nhật phiếu mượn thành công.');
}
public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index')
                     ->with('success', 'Xóa sách thành công.');
}
}
