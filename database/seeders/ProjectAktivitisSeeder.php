<?php

namespace Database\Seeders;

use App\Models\ProjectAktivitis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class ProjectAktivitisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Mendapatkan semua ID pengguna dari tabel users
        $userIds = User::pluck('id')->toArray();

        $subjects = [
            'Biaya Operasional',
            'Biaya Material',
            'Biaya Tools',
            'Biaya Gaji',
            'Biaya Lainnya'
        ];

        // Loop untuk membuat beberapa data acak
        for ($i = 0; $i < 30; $i++) {
            ProjectAktivitis::create([
                'project_id' => $faker->numberBetween(1, 20),
                'comment' => $faker->paragraph,
                'subject' => $faker->randomElement($subjects),
                'date' => $faker->date(),
                'cost' => $faker->randomFloat(2, 100, 1000),
                'user_id' => $faker->randomElement($userIds),
            ]);
        }
    }
}
