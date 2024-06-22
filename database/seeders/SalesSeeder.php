<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\User;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Mendapatkan semua ID pengguna dari tabel users
        $userIds = User::pluck('id')->toArray();

        // Loop untuk membuat beberapa data acak
        for ($i = 0; $i < 20; $i++) {
            Sales::create([
                'pembeli' => $faker->name,
                'keterangan' => $faker->paragraph,
                'beli' => $faker->randomFloat(2, 10000, 1000000),
                'jual' => $faker->randomFloat(2, 10000, 2000000),
                'tgl' => $faker->date(),
                'user' => $faker->randomElement($userIds),
                'status' => $faker->randomElement([0, 1]), // Status pembayaran
            ]);
        }
    }
}
