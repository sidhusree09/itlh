<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Booking;

class Bookings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bookings';
    }

    public static function seed()
    {
        Booking::create([
            'user_id' => 1,
            'service_id' => 1,
            'date' => '2023-05-01',
            'time' => '09:00:00',
        ]);

        Booking::create([
            'user_id' => 2,
            'service_id' => 2,
            'date' => '2023-05-02',
            'time' => '14:00:00',
        ]);
    }
}

?>