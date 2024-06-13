<?php

namespace Database\Seeders;

use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InstitutePengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat instance dari Faker
        $faker = Faker::create();

        // Mendapatkan semua ID proyek dari tabel institute_proyeks
        $proyekIds = InstituteProyeks::pluck('id')->toArray();
        
        // Mendapatkan semua ID institute dari tabel institute_proyeks
        $instIds = InstituteProyeks::pluck('id_inst')->toArray();

        // Mendapatkan semua ID user dari tabel users
        $userIds = User::pluck('id')->toArray();

        // Daftar subject yang telah ditentukan
        $subjects = [
            'Biaya Operasional',
            'Biaya Material',
            'Biaya Tools',
            'Biaya Gaji',
            'Biaya Lainnya'
        ];

        // Loop untuk membuat beberapa data acak
        for ($i = 0; $i < 120; $i++) {
            InstitutePengeluaran::create([
                'project_id' => $faker->randomElement($proyekIds),
                'id_inst' => $faker->randomElement($instIds),
                'comment' => $faker->paragraph,
                'subject' => $faker->randomElement($subjects),
                'date' => $faker->date(),
                'cost' => $faker->randomFloat(2, 10000, 1000000),
                'user_id' => $faker->randomElement($userIds),
            ]);
        }
    }
}
