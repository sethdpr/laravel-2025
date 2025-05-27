<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use Illuminate\Http\Request;


class FixtureController extends Controller
{
    public function index()
    {
        $fixtures = Fixture::orderBy('date')->get();
        return view('fixtures.index', compact('fixtures'));
    }

    public function create()
    {
        return view('fixtures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'competition' => 'required|string|max:255',
            'date' => 'required|date',
            'opponent' => 'required|string|max:255',
            'opponent_logo' => 'nullable|image|max:2048',
            'location' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('opponent_logo')) {
            $path = $request->file('opponent_logo')->store('logos', 'public');
            $validated['opponent_logo'] = $path;
        }

        Fixture::create($validated);

        return redirect()->route('fixtures.index')->with('success', 'Fixture added.');
    }

    public function destroy(Fixture $fixture)
    {
    $fixture->delete();
    return redirect()->route('fixtures.index')->with('success', 'Fixture deleted.');
    }
}
