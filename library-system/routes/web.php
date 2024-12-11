<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for login and logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Routes for the Admin Dashboard and Librarian Dashboard
Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-librarians', [AdminController::class, 'manageLibrarians'])->name('admin.manage-librarians');
    Route::post('/admin/add-librarian', [AdminController::class, 'addLibrarian'])->name('admin.add-librarian');
    Route::delete('/admin/remove-librarian/{id}', [AdminController::class, 'removeLibrarian'])->name('admin.remove-librarian');
    Route::post('/admin/approve-collection/{id}', [AdminController::class, 'approveCollection'])->name('admin.approve-collection');
    Route::post('/admin/reject-collection/{id}', [AdminController::class, 'rejectCollection'])->name('admin.reject-collection');

    // Librarian Routes
    Route::get('/librarian/dashboard', [AuthController::class, 'librarianDashboard'])->name('librarian.dashboard');
});

// Routes for books (you may update or extend this part)
Route::get('/books', function () {
    return view('books');
});
