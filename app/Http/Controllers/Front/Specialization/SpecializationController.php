<?php

namespace App\Http\Controllers\Front\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Vet\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $specializations = Specialization::orderBy('updated_at','desc')->paginate($this->pagination);
        return view('front.pages.specializations.index',compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'vet_id' => 'required|integer|max:255',
            'specie_id' => 'required|integer|max:255',
        ]);
        Specialization::create($validateData);
        return redirect()->route('specializations')->with('success','Specialization added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('front.pages.specializations.show',compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('front.pages.specializations.edit',compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specialization = Specialization::findOrFail($id);
        $validateDate = $request->validate([
            'vet_id' => 'required|integer|max:255',
            'specie_id' =>'required|integer|max:255',
        ]);
        $specialization->update($validateDate);
        return redirect()->route('specializations')->with('success','Specialization updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialization = Specialization::findOrFail($id);
        $specialization->delete();
        return redirect()->route('specializations')->with('success','Specialization successfully updated!');
    }
}
