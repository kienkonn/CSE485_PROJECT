<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;
use App\Models\Borrow;
use App\Models\Book;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['reader', 'book'])->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.create', compact('readers', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date'
        ]);

        Borrow::create($request->all());

        return redirect()->route('borrows.index')
                         ->with('success', 'Ghi nhận mượn sách thành công.');
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
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'status' => 'required|boolean'
        ]);

        $borrow->update($request->all());

        return redirect()->route('borrows.index')
                         ->with('success', 'Cập nhật thông tin mượn trả thành công.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();

        return redirect()->route('borrows.index')
                         ->with('success', 'Xóa thông tin mượn trả thành công.');
    }

    public function history(Reader $reader)
    {
        $borrows = $reader->borrows()->with('book')->get();
        return view('borrows.history', compact('reader', 'borrows'));
    }
}
