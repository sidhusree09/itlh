<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Services::all();
        return view('schedules.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'service_id' => 'required',
        ]);
        
        $schedule = new Schedule;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->service_id = $request->service_id;
        $schedule->user_id = Auth::id();
        $schedule->save();
        
        //Schedule::create($request->all());

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule created successfully.');
    }
    
    
    public function ajaxStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'service_id' => 'required',
        ]);
        
        $schedule = new Schedule;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->service_id = $request->service_id;
        $schedule->user_id = Auth::id();
        $schedule->save();
        
        $data = ['message' => 'Booking Created Successfully'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $services = Services::all();
        return view('schedules.edit', compact('schedule','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        /*$request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);*/

        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->service_id = $request->service_id;
        $schedule->user_id = Auth::id();
        $schedule->save();
        
        //$schedule->update($request->all());

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule deleted successfully.');
    }
}

