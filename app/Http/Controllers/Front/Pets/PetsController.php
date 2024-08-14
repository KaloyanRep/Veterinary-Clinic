<?php

namespace App\Http\Controllers\Front\Pets;

use App\Http\Controllers\Controller;
use App\Models\Vet\Pet; // Corrected namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = DB::table('pets');


        if ($request->has('gender') && $request->input('gender') != '') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('created_from') && $request->input('created_from') != '') {
            $query->whereDate('created_at', '>=', $request->input('created_from'));
        }

        if ($request->has('created_to') && $request->input('created_to') != '') {
            $query->whereDate('created_at', '<=', $request->input('created_to'));
        }



        $pets = $query->paginate(5)->appends($request->all());

        return view('front.pages.pets.index', compact( 'pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('front.pages.pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'owner_id' => 'required|integer',
            'color' => 'required|string|max:255',
            'gender' => 'required|string',
            'neutered' => 'boolean',
        ]);

        $validatedData['neutered'] = $request->has('neutered');
       //  dd($validatedData);
        Pet::create($validatedData);

        return redirect()->route('pets')->with('success', 'Pet added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pet = Pet::with('visits')->findOrFail($id);
        return view('front.pages.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id);
        return view("front.pages.pets.edit",compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = Pet::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'owner_id' => 'required|integer',
            'color' => 'required|string|max:255',
            'gender' => 'required|string',
            'neutered' => 'sometimes|boolean',
        ]);
        $validatedData['neutered'] = $request->has('neutered');

        $pet->update($validatedData);
        return redirect()->route("pets")->with('success','Pet updated successfully.');

    }

    public function getPetInfo($id)
    {
        $pet = Pet::find($id);
        return response()->json($pet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route("pets")->with('success', 'Pet deleted successfully.');
    }
}
