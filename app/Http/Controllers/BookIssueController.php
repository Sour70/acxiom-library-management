<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\User;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    //
     // Display all issued books
     public function index()
     {
         $issuedBooks = IssuedBook::with('user', 'book')->get();
         return view('issued_books.index', compact('issuedBooks'));
     }
 
     // Show the form to issue a book
     public function create()
     {
         $books = Book::where('status', 'available')->get();
         $users = User::all();
         return view('issued_books.create', compact('books', 'users'));
     }
 
     // Store the issued book record
     public function store(Request $request)
     {
         $validated = $request->validate([
             'user_id' => 'required|exists:users,id',
             'book_id' => 'required|exists:books,id',
             'issue_date' => 'required|date',
             'return_date' => 'nullable|date|after_or_equal:issue_date',
         ]);
 
         $book = Book::findOrFail($validated['book_id']);
         $book->update(['status' => 'unavailable']);
 
         IssuedBook::create($validated + ['status' => 'issued']);
 
         return redirect()->route('issued-books.index')->with('success', 'Book issued successfully.');
     }
 
     // Update the status of the book when returned
    //  public function update(Request $request, IssuedBook $issuedBook)
    //  {
    //      $issuedBook->update(['status' => 'returned']);
    //      $issuedBook->book->update(['status' => 'available']);
 
    //      return redirect()->route('issued-books.index')->with('success', 'Book returned successfully.');
    //  }

    public function update(Request $request, IssuedBook $issuedBook)
{
    $fine = 0;
    $today = now();

    // Calculate fine if the book is returned late
    if ($issuedBook->return_date && $today->gt($issuedBook->return_date)) {
        $daysLate = $today->diffInDays($issuedBook->return_date);
        $fine = $daysLate * config('library.fine_rate_per_day');
    }

    $issuedBook->update([
        'status' => 'returned',
        'fine' => $fine,
    ]);

    $issuedBook->book->update(['status' => 'available']);

    return redirect()->route('issued-books.index')
        ->with('success', 'Book returned successfully. Fine: ' . number_format($fine, 2));
}

}
