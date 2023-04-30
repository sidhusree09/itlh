<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Bookings;
use App\Models\ServiceViews;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Todo
        //get total views for all services
        $now = Carbon::now();        
        $monthNumber = $now->month;
        $monthName = $now->format('F');
        
        //get activites - static
        //Bookings total monthly basis
        $bookings = new Bookings;
        $bookingsCount = $bookings->getDashboardBookings();
        $totalBookingValue = $bookings->getTotalBookings();
        $averageBookingsValue = round($totalBookingValue/$bookingsCount,0,2); 
        // cards
        // revenue for present month
            // Total for that month
            // From switch members - static
            // Bookings this month
            // Views this month
            $serviceViews  = new ServiceViews;
            $totalViews = $serviceViews->getMonthViews();
        // Switch Credit static
        // top performances
            // Seller badge 
            // Bookings for that month
            // Views this month
        // Static
        return view('home',compact('monthName','bookingsCount','averageBookingsValue','totalBookingValue','totalViews'));
    }
}
