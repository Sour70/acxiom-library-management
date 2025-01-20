<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Key metrics
        $totalBooks = Book::count();
        $issuedBooks = IssuedBook::where('status', 'issued')->count();
        $returnedBooks = IssuedBook::where('status', 'returned')->count();
        $totalFines = IssuedBook::whereNotNull('fine')->sum('fine');
        
        // Recent activities
        $recentActivities = IssuedBook::with('user', 'book')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('totalBooks', 'issuedBooks', 'returnedBooks', 'totalFines', 'recentActivities'));
    }
}
