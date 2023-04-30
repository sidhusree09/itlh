<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    public function index()
    {
        $bookings = Bookings::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $services = Services::all();
        $category = Category::all();
        return view('bookings.create', compact(['services','category']));
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[            
            'service_id' => 'required|integer',            
            'time' => 'required',
            'date' => 'required|date',            
        ]);
        
         if ($validatedData->fails()) {
            return redirect()->route('bookings.create')
                    ->withErrors($validatorData)
                    ->withInput();
        }

        $booking = new Bookings();
        $booking->user_id = $request->user_id;
        $booking->service_id = $request->service_id;        
        $booking->time = $request->time;
        $booking->date = $request->date;
        $booking->user_id = auth()->user()->id;
        $booking->message = $request->message;
        $booking->remarks = ''; // set to empty
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    public function ajaxStore(Request $request)
    {
        $validatedData = Validator::make($request->all(),[            
            'service_id' => 'required|integer',            
            'time' => 'required',
            'date' => 'required|date',            
        ]);
        
         if ($validatedData->fails()) {
            return redirect()->route('bookings.create')
                    ->withErrors($validatorData)
                    ->withInput();
        }

        $booking = new Bookings();
        $booking->user_id = $request->user_id;
        $booking->service_id = $request->service_id;        
        $booking->time = $request->time;
        $booking->date = $request->date;
        $booking->user_id = auth()->user()->id;
        $booking->message = $request->message;
        $booking->status = 1; // booked
        $booking->remarks = ''; // set to empty
        $booking->save();

        $data = ['message' => 'Booking Created Successfully'];
        return response()->json($data);
    }


    public function show($id)
    {
        $booking = Bookings::find($id);
        return view('bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Bookings::find($id);
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'service_id' => 'required|integer',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required|string',
        ]);

        $booking = Bookings::find($id);
        $booking->user_id = $request->user_id;
        $booking->service_id = $request->service_id;
        $booking->start_time = $request->start_time;
        $booking->end_time = $request->end_time;
        $booking->status = $request->status;
        $booking->message = $request->message;
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = Bookings::find($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
    
    public function cancel(Request $request)
    {        
        $booking = Bookings::find($request->id);        
        $booking->status = 0; // cancelled
        $booking->remarks = $request->remarks;        
        $booking->save();
    
        $data = ['message' => 'Booking Canceled Sucessfuly'];
        return response()->json($data);
    }
}


?>