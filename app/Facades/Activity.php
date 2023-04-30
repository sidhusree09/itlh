<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Activity;

class Activity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'activity';
    }

    public static function seed()
    {
        Activity::create([
            'user_id' => 1,
            'service_id' => 1,
            'activity_type' => 'view',
            'activity_time' => now(),
        ]);

        Activity::create([
            'user_id' => 2,
            'service_id' => 2,
            'activity_type' => 'book',
            'activity_time' => now(),
        ]);
    }
}

?>