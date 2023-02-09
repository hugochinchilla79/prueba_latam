<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = config('auth.default_user.name');
        $email = config('auth.default_user.email');
        $password = config('auth.default_user.password');

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->id_country = 1;
        $user->password = Hash::make($password);
        
        
        $user->save();
    }
}
