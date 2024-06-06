<?php

namespace Database\Seeders;

use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Loop untuk membuat beberapa data acak

        $userIds = User::pluck('id')->toArray();
        for ($i = 0; $i < 120; $i++) {
            ProjectTask::create([
                'project_id' => $faker->numberBetween(1, 20), // Ganti dengan rentang yang sesuai
                'task' => $faker->sentence(6),
                'description' => $faker->paragraph,
                'status' => $faker->randomElement([1, 3]), // Ubah sesuai dengan status yang diinginkan
                'date_created' => $faker->date(),
                'due_date' => $faker->date(),
                'user_id' => $faker->randomElement($userIds), // Ganti dengan rentang yang sesuai
            ]);
        }
    }
}
