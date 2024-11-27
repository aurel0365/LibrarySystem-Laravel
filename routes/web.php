<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman login (GET)
Route::get('/login', function () {
    return view('login');
});

// Rute untuk menangani form login (POST)
Route::post('/login', function (Request $request) {
    // Validasi input email dan password
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cek autentikasi
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role == 'admin') {
            return redirect('/admin-dashboard');
        } elseif ($user->role == 'pustakawan') {
            return redirect('/pustakawan-dashboard');
        }
    }

    // Jika gagal login
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
});

// Rute untuk dashboard admin (hanya admin yang bisa akses)
Route::middleware(['auth'])->get('/admin-dashboard', function () {
    if (Auth::user()->role !== 'admin') {
        abort(403); // Jika bukan admin, akses ditolak
    }
    return view('admin.dashboard');
});

// Rute untuk dashboard pustakawan (hanya pustakawan yang bisa akses)
Route::middleware(['auth'])->get('/pustakawan-dashboard', function () {
    if (Auth::user()->role !== 'pustakawan') {
        abort(403); // Jika bukan pustakawan, akses ditolak
    }
    return view('pustakawan.dashboard');
});

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// Tambahkan rute lainnya sesuai dengan kebutuhan aplikasi kamu

// Rute fallback jika route tidak ditemukan
Route::fallback(function () {
    return view('404');  // Halaman 404 jika route tidak ditemukan
});
