<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book','user'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        $users = User::all();

        return view('loans.create', compact('books','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date'
        ]);

        $book = Book::find($request->book_id);
        if (!$book) {
            return redirect()->back()->with('error', 'الكتاب غير موجود');
        }
        if ($book->quantity < 1) {
            return redirect()->back()->with('error', 'لا توجد نسخ متاحة من هذا الكتاب');
        }

        // إنقاص الكمية
        $book->quantity -= 1;
        $book->save();

        Loan::create($request->all());

        return redirect()->route('loans.index')
            ->with('success', 'تم تسجيل الاستعارة وتم إنقاص الكمية');
    }

    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        $books = Book::all();
        $users = User::all();

        return view('loans.edit', compact('loan','books','users'));
    }

    public function update(Request $request, Loan $loan)
    {
        $loan->update($request->all());

        return redirect()->route('loans.index')
            ->with('success', 'تم تحديث الاستعارة');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'تم حذف الاستعارة');
    }
}