<?php

namespace App\Http\Controllers\Front\Visits;

use App\Http\Controllers\Controller;
use App\Models\Vet\Visit;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $visits = Visit::orderBy('created_at','desc')->paginate($this->pagination);
        return view('front.pages.visits.index',compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.visits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'vet_id' => 'required|integer|max:255',
            'pet_id' => 'required|integer|max:255',
            'arrived_at' => 'required|date',
            'total_amount' => 'required|numeric',
            'diagnose' => 'required|string|max:255',
        ]);

        Visit::create($validateData);
        return redirect()->route('visits')->with('success','Visit added successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visit = Visit::findOrFail($id);
        return view('front.pages.visits.show',compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visit = Visit::findOrFail($id);
        return view('front.pages.visits.edit',compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visit = Visit::findOrFail($id);

        $validateData = $request->validate([
            'vet_id' => 'required|integer|max:255',
            'pet_id' => 'required|integer|max:255',
            'arrived_at' => 'required|date',
            'total_amount' => 'required|numeric',
            'diagnose' => 'required|string|max:255',
        ]);
        $visit->update($validateData);
        return redirect()->route('visits')->with('success','Visit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect()->route('visits')->with('success','Visit successfully deleted');
    }
}
