<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Buat user admin
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'superAdmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451',
            'type' => '0'
        ])->assignRole('admin');

        // Buat user manager
        User::create([
            'firstname' => 'Manager',
            'lastname' => 'Manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451',
            'type' => '2'
        ])->assignRole('manager');

        // Buat user biasa
        User::create([
            'firstname' => 'User',
            'lastname' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082192598451',
            'type' => '1'
        ])->assignRole('user');

        // Buat 3 user admin random
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username' => 'admin' . $i,
                'email' => 'admin' . $i . '@gmail.com',
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'type' => '0'
            ])->assignRole('admin');
        }

        // Buat 3 user manager random
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username' => 'manager' . $i,
                'email' => 'manager' . $i . '@gmail.com',
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'type' => '1'
            ])->assignRole('manager');
        }

        // Buat 3 user biasa random
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'type' => '2'
            ])->assignRole('user');
        }
    }
}
