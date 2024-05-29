<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\InstituteMitra;
use App\Models\InstituteProyeks;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class InstituteProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat instance dari Faker
        $faker = Faker::create();

        // Mendapatkan semua ID mitra dari tabel institute_mitras
        $mitraIds = InstituteMitra::pluck('id')->toArray();

        // Mendapatkan semua ID user yang memiliki role 'manager' dari tabel users

        $managerRole = Role::where('name', 'manager')->first();
        $managerIds = User::role($managerRole)->pluck('id')->toArray();

        // Loop untuk membuat beberapa data acak
        for ($i = 0; $i < 20; $i++) {
            $idInst = $faker->randomElement($mitraIds);

            InstituteProyeks::create([
                'id_inst' => $idInst,
                'periode' => $faker->date('Ymd', '2024-01-01'),
                'paket' => $idInst != 2 ? 0 : $faker->numberBetween(1, 6),
                'sektor' => $faker->city,
                'keterangan' => 'Description of project ' . ($i + 1),
                'PA' => $faker->numberBetween(0, 30),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'tagihan' => $faker->randomFloat(2, 200000, 1000000),
                'status' => $faker->randomElement([0, 1, 2]), // 0=hold, 1=onprogress, 2=complete
                'payment' => $faker->randomElement([0, 1, 2]), // 0=belum, 1=proses, 2=terbayar
                'manager_id' => $faker->randomElement($managerIds), // Mengambil ID manager secara acak dari daftar
            ]);
        }
    }
}
