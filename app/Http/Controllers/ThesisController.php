<?php
namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function index()
    {
        $theses = Thesis::all();
        return view('theses.index', compact('theses'));
    }

    public function create()
    {
        return view('theses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'year' => 'required|integer',
            'access_type' => 'required|in:available,restricted',
        ]);

        Thesis::create($request->all());

        return redirect()->route('theses.index')->with('success', 'Thesis added successfully.');
    }

    public function edit(Thesis $thesis)
    {
        return view('theses.edit', compact('thesis'));
    }

    public function update(Request $request, Thesis $thesis)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'year' => 'required|integer',
            'access_type' => 'required|in:available,restricted',
        ]);

        $thesis->update($request->all());

        return redirect()->route('theses.index')->with('success', 'Thesis updated successfully.');
    }

    public function destroy(Thesis $thesis)
    {
        $thesis->delete();
        return redirect()->route('theses.index')->with('success', 'Thesis deleted successfully.');
    }
}
