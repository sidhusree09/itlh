<?php 
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\User;

class Users extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'users';
    }

    public static function seed()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe1@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
?>