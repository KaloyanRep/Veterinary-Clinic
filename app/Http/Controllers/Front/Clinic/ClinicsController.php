<?php

namespace App\Http\Controllers\Front\Clinic;

use App\Http\Controllers\Controller;
use App\Models\Vet\Clinic;
use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Initialize the query
        $query = Clinic::orderBy('updated_at', 'desc');

        // Apply filter if 'type' is provided
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Paginate the results
        $clinics = $query->paginate($this->pagination);

        if ($request->ajax()) {
            return response()->json([
                'data' => $clinics, // Return the paginated clinics directly
                'links' => (string) $clinics->links(),
            ]);
        }

        // Handle non-AJAX requests here...
        return view('front.pages.clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clinics = Clinic::paginate($this->pagination); // Paginate the clinics
        return view('front.pages.clinics.create', compact('clinics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'type' => 'required',
            'address' => 'required|string|max:255',
        ]);

        $clinic = Clinic::create([
            'name' => $request->name,
            'type' => $request->type,
            'address' => $request->address
        ]);

        return response()->json([
            'success' => 'Clinic saved successfully!',
            'data' => $clinic // Return the newly created clinic
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view("front.pages.clinics.show", compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view("front.pages.clinics.edit", compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clinic = Clinic::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'address' => 'required|string|max:255'
        ]);

        $clinic->update($validatedData);

        // Flash the success message to the session
        $request->session()->flash('success', 'Clinic updated successfully.');

        // Redirect to the edit page for the updated clinic
        return redirect()->route("clinics.create", $clinic->id);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        return response()->json(['success' => 'Clinic deleted successfully!']);
    }
}

