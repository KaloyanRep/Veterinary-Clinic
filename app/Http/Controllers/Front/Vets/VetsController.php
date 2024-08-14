<?php

namespace App\Http\Controllers\Front\Vets;

use App\Http\Controllers\Controller;
use App\Models\Vet\Vet;
use App\Models\Vet\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DB::table('vets')
                   ->leftJoin('visits', 'vets.id', '=', 'visits.vet_id')
                   ->select('vets.*', 'visits.arrived_at', 'visits.id as visit_id') //columns
                   ->orderBy('vets.created_at', 'desc');

        // Apply filters if they exist
        if ($request->filled('name')) {
            $query->where('vets.name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('vets.email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('city')) {
            $query->where('vets.city', 'like', '%' . $request->city . '%');
        }

        if ($request->filled('arrived_at')) {
            $query->whereDate('visits.arrived_at', $request->arrived_at);
        }

        $vets = $query->paginate($this->pagination);

        if ($request->ajax()) {
            $view = view('front.pages.vets.partials.vet_table', ['vets' => $vets])->render();
            return response()->json(['success' => true, 'view' => $view]);
        }

        return view('front.pages.vets.index', compact('vets'));
    }
//->paginate($this->pagination);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('front.pages.vets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|min:1',
            'email' => 'required|email|unique:vets,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15',
            'city' => 'required|string|max:255',
        ]);


        Vet::create($validateData);
        return redirect()->route('vets')->with('success','Vet added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vet = Vet::findOrFail($id);
        return view('front.pages.vets.show',compact('vet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vet = Vet::findOrFail($id);
        return view('front.pages.vets.edit',compact('vet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vet = Vet::findOrFail($id);

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',
            'position_id' => 'required|integer|min:1',
            'email' => 'required|string|max:255|email',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15',
            'city' => 'required|string|max:255',
        ]);

        $vet->update($validatedData);
        return redirect()->route("vets")->with('success','Vet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vet = Vet::findOrFail($id);
        $vet->delete();
        return redirect()->route('vets')->with('success','Vet successfully deleted!');
    }
}
