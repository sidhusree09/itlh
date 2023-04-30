<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Service;

class Services extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'services';
    }

    public static function seed()
    {
        Service::create([
            'name' => 'House Cleaning',
            'description' => 'Professional cleaning services for homes',
            'price' => 50.00,
        ]);

        Service::create([
            'name' => 'Lawn Mowing',
            'description' => 'Lawn care and maintenance services',
            'price' => 25.00,
        ]);
    }
}

?>