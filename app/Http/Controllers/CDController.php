<?php
namespace App\Http\Controllers;

use App\Models\CD;
use Illuminate\Http\Request;

class CDController extends Controller
{
    public function index()
    {
        $cds = CD::all();
        return view('cds.index', compact('cds'));
    }

    public function create()
    {
        return view('cds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'type' => 'required|in:audio,video',
            'quantity' => 'required|integer|min:1',
        ]);

        CD::create($request->all());

        return redirect()->route('cds.index')->with('success', 'CD added successfully.');
    }

    public function edit(CD $cd)
    {
        return view('cds.edit', compact('cd'));
    }

    public function update(Request $request, CD $cd)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'type' => 'required|in:audio,video',
            'quantity' => 'required|integer|min:1',
        ]);

        $cd->update($request->all());

        return redirect()->route('cds.index')->with('success', 'CD updated successfully.');
    }

    public function destroy(CD $cd)
    {
        $cd->delete();
        return redirect()->route('cds.index')->with('success', 'CD deleted successfully.');
    }
}
