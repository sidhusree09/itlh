<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Profile;

class Profiles extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profiles';
    }

    public static function seed()
    {
        Profile::create([
            'user_id' => 1,
            'bio' => 'I am a professional cleaner with over 5 years of experience',
            'avatar' => 'avatar1.jpg',
            'phone_number' => '555-1234',
            'location' => 'New York City',
        ]);

        Profile::create([
            'user_id' => 2,
            'bio' => 'I am a lawn care specialist with a passion for green spaces',
            'avatar' => 'avatar2.jpg',
            'phone_number' => '555-5678',
        'location' => 'Los Angeles',
        ]);
    }
}
           
?>