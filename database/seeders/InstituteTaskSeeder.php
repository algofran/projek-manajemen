<?php

namespace Database\Seeders;

use App\Models\InstituteMitra;
use App\Models\InstituteProyeks;
use App\Models\InstituteProyekTask;
use App\Models\InstituteTask;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InstituteTaskSeeder extends Seeder
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

        // Mendapatkan semua username dari tabel users
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            InstituteTask::create([
                'project_id' => $faker->randomElement($proyekIds),
                'task' => $faker->sentence(6),
                'description' => $faker->paragraph,
                'status' => $faker->randomElement([0, 3]), // Ubah sesuai dengan status yang diinginkan
                'date_created' => $faker->date(),
                'due_date' => $faker->date(),
                'user_id' => $faker->randomElement($userIds), // Mengambil username secara acak dari daftar
            ]);
        }
    }
}
