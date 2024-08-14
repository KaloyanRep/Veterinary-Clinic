<?php

namespace App\Http\Controllers\Front\Owner;

use App\Http\Controllers\Controller;
use App\Models\Vet\Owner;
use Illuminate\Http\Request;
use App\Http\Resources\OwnersResource;
use App\Http\Requests\OwnersRequest;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Owner::orderBy('updated_at', 'desc');

        // Apply filters if provided
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('address') && $request->address != '') {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Paginate the results
        $owners = $query->paginate($this->pagination);

        return view('front.pages.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnersRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:owners,email',
            'phone' => 'required|digits_between:10,15',
        ]);

        Owner::create($validatedData);
        return redirect()->route('owners')->with('success', 'Owner added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('front.pages.owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('front.pages.owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnersRequest $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:owners,email,' . $id,
            'phone' => 'required|digits_between:10,15',
        ]);

        $owner = Owner::findOrFail($id); // Find the owner by ID
        $owner->update($validatedData);  // Update the owner with validated data

        return redirect()->route('owners')->with('success', 'Owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();
        return redirect()->route('owners')->with('success', 'Owner deleted successfully!');
    }



}

