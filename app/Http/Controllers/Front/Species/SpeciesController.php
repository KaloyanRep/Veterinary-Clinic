<?php

namespace App\Http\Controllers\Front\Species;

use App\Http\Controllers\Controller;
use App\Models\Vet\Specie;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Order by updated_at and paginate results
        $species = Specie::orderBy('created_at', 'desc')->paginate($this->pagination);

        if ($request->ajax()) {
            $view = view('front.pages.species.partials.species_table', ["species" => $species])->render();
            return response()->json(["success" => true, 'view' => $view]);
        }

        return view('front.pages.species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.species.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $specie = Specie::create([
            'name' => $validatedData['name'],
        ]);

        // Redirect back to the index page after storing the data
        return redirect()->route('species')->with('success', 'Specie created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $specie = Specie::findOrFail($id);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'specie' => $specie]);
        } else {
            return view('front.pages.species.show', compact('specie'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specie = Specie::findOrFail($id);
        return view('front.pages.species.edit', compact('specie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specie = Specie::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $specie->update($validatedData);
        return redirect()->route('species')->with('success', 'Specie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specie = Specie::findOrFail($id);
        $specie->delete();
        return redirect()->route('species')->with('success', 'Specie deleted successfully');
    }
}
