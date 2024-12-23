<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;
use App\Models\Borrow;
use App\Models\Book;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Reader::create($request->all());

        return redirect()->route('readers.index')
                         ->with('success', 'Thêm độc giả thành công.');
    }

    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, Reader $reader)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $reader->update($request->all());

        return redirect()->route('readers.index')
                         ->with('success', 'Cập nhật thông tin độc giả thành công.');
    }

    public function destroy(Reader $reader)
    {
        $reader->delete();

        return redirect()->route('readers.index')
                         ->with('success', 'Xóa độc giả thành công.');
    }
}