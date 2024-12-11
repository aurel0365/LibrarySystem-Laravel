<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Impor Request
use Illuminate\Support\Facades\DB; // Impor DB
use Illuminate\Support\Facades\Hash; // Impor Hash
use Carbon\Carbon; // Impor Carbon untuk manipulasi tanggal

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = DB::table('users')->where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);

            // Redirect user based on role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/librarian/dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }

    public function adminDashboard()
    {
        $user = session('user');
        if (!$user || $user->role != 'admin') {
            return redirect('/login');
        }

        return view('admin.dashboard');
    }

    public function librarianDashboard()
    {
        $user = session('user');
        if (!$user || $user->role != 'pustakawan') {
            return redirect('/login');
        }

        // Cek apakah pustakawan sudah melakukan pembaruan koleksi dalam 3 bulan terakhir
        $lastUpdate = Carbon::parse($user->last_collection_update);
        $updateDue = $lastUpdate->addMonths(3)->isPast();

        return view('librarian.dashboard', ['user' => $user, 'updateDue' => $updateDue]);
    }

    public function approveOrRejectCollectionUpdate($requestId, $status)
    {
        // Logic untuk menyetujui atau menolak pembaruan koleksi oleh pustakawan
    }

    public function addOrRemoveLibrarian($action, $userId)
    {
        // Logic untuk menambah atau menghapus pustakawan
    }
}
