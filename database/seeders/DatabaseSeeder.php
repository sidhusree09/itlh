<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Facades\Users;
use App\Facades\Services;
use App\Facades\Bookings;
use App\Facades\Schedules;
use App\Facades\Profiles;
use App\Facades\Activity;
use App\Facades\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Users::seed();
        Category::seed();
        Services::seed();
        Bookings::seed();
        Schedules::seed();
        Profiles::seed();
        Activity::seed();
    }
}
