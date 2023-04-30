<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Service;

class Category extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'category';
    }

    public static function seed()
    {
        Category::create([
            'name' => 'Business',
            'description' => 'Trading activities',            
        ]);

        Service::create([
            'name' => 'Services',
            'description' => 'Service Activities',           
        ]);
    }
}

?>