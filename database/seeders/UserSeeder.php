<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::where('email', 'dmin@gmail.com')->first();


        if (!$user) {
            User::create([
                'fname' => 'Esraa',
                'lname' => 'Tea',
                'email' => 'admin@gmail.com',
                'phone' => '0912345678',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);
        }
        User::create([
            'fname' => 'Alaa',
            'lname' => 'Tea',
            'email' => 'alaa@gmail.com',
            'phone' => '0912345678',
            'role' => 'customer',
            'password' => Hash::make('password'),
        ]);
    }
}
