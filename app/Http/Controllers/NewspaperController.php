<?php
namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    public function index()
    {
        $newspapers = Newspaper::all();
        return view('newspapers.index', compact('newspapers'));
    }

    public function create()
    {
        return view('newspapers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'access_type' => 'required|in:available,stored',
        ]);

        Newspaper::create($request->all());

        return redirect()->route('newspapers.index')->with('success', 'Newspaper added successfully.');
    }

    public function edit(Newspaper $newspaper)
    {
        return view('newspapers.edit', compact('newspaper'));
    }

    public function update(Request $request, Newspaper $newspaper)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'access_type' => 'required|in:available,stored',
        ]);

        $newspaper->update($request->all());

        return redirect()->route('newspapers.index')->with('success', 'Newspaper updated successfully.');
    }

    public function destroy(Newspaper $newspaper)
    {
        $newspaper->delete();
        return redirect()->route('newspapers.index')->with('success', 'Newspaper deleted successfully.');
    }
}
