<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'superAdmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451'
        ])->assignRole('admin');

        User::create([
            'firstname' => 'User',
            'lastname' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451'
        ])->assignRole('user');

        User::create([
            'firstname' => 'manager',
            'lastname' => 'manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451'
        ])->assignRole('manager');
    }
}
