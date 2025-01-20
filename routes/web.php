<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Middleware\RoleMiddleware;

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(RoleMiddleware::class . ':admin');

Route::get('/user', [UserController::class, 'index'])
    ->middleware(RoleMiddleware::class . ':user');

Route::resource('books', BookController::class);


Route::resource('issued-books', BookIssueController::class)->only(['index', 'create', 'store', 'update']);
Route::get('/reports/issued-books', [ReportController::class, 'issuedBooks'])->name('reports.issuedBooks');
Route::get('/reports/returned-books', [ReportController::class, 'returnedBooks'])->name('reports.returnedBooks');
Route::get('/reports/fines', [ReportController::class, 'fines'])->name('reports.fines');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('user/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/user/login', function () {
    return view('user.login');
})->name('user.login');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
