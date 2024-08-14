<?php

namespace App\Http\Controllers\Front\Prescription;

use App\Http\Controllers\Controller;
use App\Models\Vet\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prescriptions = Prescription::orderBy('updated_at', 'desc')->paginate($this->pagination);
        return view('front.pages.prescription.index',compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.prescription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
           'vet_id' => 'required|integer|max:255',
           'owner_id' => 'required|integer|max:255',
        ]);

        Prescription::create($validateData);
        return redirect()->route('prescriptions')->with('success','Prescription added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('front.pages.prescription.show',compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('front.pages.prescription.edit',compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prescription = Prescription::findOrFail($id);

        $validateData = $request->validate([
            'vet_id' => 'required|integer|max:255',
            'owner_id' => 'required|integer|max:255',
        ]);
        $prescription->update($validateData);
        return redirect()->route('prescriptions')->with('success','Prescription updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();
        return redirect()->route('prescriptions')->with('success','Prescription successfully deleted!');
    }
}
