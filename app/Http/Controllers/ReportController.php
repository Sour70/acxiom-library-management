<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssuedBook;

class ReportController extends Controller
{
    //
    public function issuedBooks()
    {
        $issuedBooks = IssuedBook::where('status', 'issued')->with('user', 'book')->get();
        return view('reports.issued_books', compact('issuedBooks'));
    }

    // Report for returned books
    public function returnedBooks()
    {
        $returnedBooks = IssuedBook::where('status', 'returned')->with('user', 'book')->get();
        return view('reports.returned_books', compact('returnedBooks'));
    }

    // Report for fines
    public function fines()
    {
        $fines = IssuedBook::whereNotNull('fine')->where('fine', '>', 0)->with('user', 'book')->get();
        return view('reports.fines', compact('fines'));
    }
}
