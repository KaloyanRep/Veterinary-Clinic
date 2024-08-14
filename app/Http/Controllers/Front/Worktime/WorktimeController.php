<?php

namespace App\Http\Controllers\Front\Worktime;

use App\Http\Controllers\Controller;
use App\Models\Vet\Worktime;
use Illuminate\Http\Request;

class WorktimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $worktimes = Worktime::orderBy('updated_at','desc')->paginate($this->pagination);
        return view('front.pages.worktime.index', compact('worktimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.worktime.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day_of_week' => 'required|string',
            'timeFrom' => 'required|date_format:H:i',
            'timeTo' => 'required|date_format:H:i|after:timeFrom'
        ]);

        $workTime = new Worktime();
        $workTime->day_of_week = $validated['day_of_week'];
        $workTime->timeFrom = $validated['timeFrom'];
        $workTime->timeTo = $validated['timeTo'];
        $workTime->save();

        return redirect()->route('worktime')->with('success', 'Work Time created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $worktime = Worktime::findOrFail($id);
        return view('front.pages.worktime.show', compact('worktime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $worktime = Worktime::findOrFail($id);
        return view('front.pages.worktime.edit', compact('worktime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $worktime = Worktime::findOrFail($id);

        $validated = $request->validate([
            'day_of_week' => 'required|string',
            'timeFrom' => 'required|date_format:H:i',
            'timeTo' => 'required|date_format:H:i|after:timeFrom'
        ]);

        $worktime->update($validated);
        return redirect()->route('worktime')->with('success', 'Worktime updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $worktime = Worktime::findOrFail($id);
        $worktime->delete();
        return redirect()->route('worktime')->with('success', 'Worktime deleted successfully!');
    }
}
