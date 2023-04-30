<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Schedule;

class Schedules extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'schedules';
    }

    public static function seed()
    {
        Schedule::create([
            'user_id' => 1,
            'weekday' => 'monday',
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
        ]);

        Schedule::create([
            'user_id' => 2,
            'weekday' => 'tuesday',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
        ]);
    }
}
?>