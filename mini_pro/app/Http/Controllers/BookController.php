<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category; // إضافة موديل التصنيفات

class BookController extends Controller
{
    public function index()
    {
        // استخدام with('category') لجلب اسم التصنيف بدون ضغط على قاعدة البيانات
        $books = Book::with('category')->get(); 
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // لازم نبعثوا التصنيفات لصفحة الإضافة عشان تطلع في الـ Select Box
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books,isbn',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id', // التأكد أن التصنيف موجود
            'published_at' => 'nullable|date',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'تم إضافة الكتاب بنجاح');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all(); // جلب التصنيفات للتعديل أيضاً
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'تم تحديث الكتاب بنجاح');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'تم حذف الكتاب بنجاح');
    }
}