<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show form for creating a new book
    public function create()
    {
        return view('books.create');
    }

    // Store a newly created book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books',
            'category' => 'required|string',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    // Show a single book (optional)
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Show form for editing a book
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update a book
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'category' => 'required|string',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
