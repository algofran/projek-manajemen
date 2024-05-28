<?php

namespace Database\Seeders;

use App\Models\InstituteList;
use App\Models\InstituteMitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PerusahaanListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        InstituteList::create([
            'name' => 'TELKOM AKSES',
            'institute' => '1',
            'alamat' => 'Antang Raya',
            'keterangan' => $faker->paragraph
        ]);

        InstituteList::create([
            'name' => 'ICON PLUS',
            'institute' => '2',
            'alamat' => 'Antang Raya',
            'keterangan' => $faker->paragraph
        ]);

        InstituteMitra::create([
            'id_inst' => '2',
            'mitra' => 'Iconnet',
            'keterangan' => $faker->paragraph
        ]);

        InstituteMitra::create([
            'id_inst' => '2',
            'mitra' => 'SERPO',
            'keterangan' => $faker->paragraph
        ]);

        InstituteMitra::create([
            'id_inst' => '1',
            'mitra' => 'Telkom Akses',
            'keterangan' => $faker->paragraph
        ]);
    }
}
