<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function manageLibrarians()
    {
        $librarians = User::where('role', 'pustakawan')->get();
        return view('admin.manage-librarians', compact('librarians'));
    }

    public function addLibrarian(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pustakawan',
        ]);
        return redirect('/admin/manage-librarians');
    }

    public function removeLibrarian($id)
    {
        User::find($id)->delete();
        return redirect('/admin/manage-librarians');
    }

    public function approveCollection($id)
    {
        // Logic to approve collection update
        return back()->with('message', 'Collection approved');
    }

    public function rejectCollection($id)
    {
        // Logic to reject collection update
        return back()->with('message', 'Collection rejected');
    }
}
