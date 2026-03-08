<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بإضافة مؤلفين');
        }
        return view('authors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بإضافة مؤلفين');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);
        $author = Author::create($validated);
        return redirect()->route('authors.index');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بتعديل المؤلفين');
        }
        return view('authors.edit', compact('author'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بتعديل المؤلفين');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);
        $author->update($validated);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بحذف المؤلفين');
        }
        $author->delete();
        return redirect()->route('authors.index');
    }
}
