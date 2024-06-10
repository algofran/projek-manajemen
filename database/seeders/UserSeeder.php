<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $users = [
            [
                'id' => 1,
                'firstname' => 'Rakhmat',
                'lastname' => 'Arief',
                'username' => 'mamat',
                'password' => Hash::make('password'),
                'type' => 1,
                'email' => 'rakhmat.arief@example.com',
                'phone' => '081234567890',
            ],
            [
                'id' => 7,
                'firstname' => 'Ipdam',
                'lastname' => '-',
                'username' => 'ipdam',
                'password' => Hash::make('password'),
                'type' => 1,
                'email' => 'ipdam@example.com',
                'phone' => '081234567891',
            ],
            [
                'id' => 8,
                'firstname' => 'Ahmal',
                'lastname' => 'Bidol',
                'username' => 'ahmal',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'ahmal.bidol@example.com',
                'phone' => '081234567892',
            ],
            [
                'id' => 9,
                'firstname' => 'Abdullah',
                'lastname' => 'Djufri',
                'username' => 'abdullah',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'abdullah.djufri@example.com',
                'phone' => '081234567893',
            ],
            [
                'id' => 10,
                'firstname' => 'Harun',
                'lastname' => 'Munde',
                'username' => 'harun',
                'password' => Hash::make('password'),
                'type' => 1,
                'email' => 'harun.munde@example.com',
                'phone' => '081234567894',
            ],
            [
                'id' => 11,
                'firstname' => 'Muhammad',
                'lastname' => 'Syafriadi',
                'username' => 'muhsyafriadi',
                'password' => Hash::make('password'),
                'type' => 1,
                'email' => 'muh.syafriadi@example.com',
                'phone' => '081234567895',
            ],
            [
                'id' => 12,
                'firstname' => 'Ilman',
                'lastname' => 'Safriansyah',
                'username' => 'ilman',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'ilman.safriansyah@example.com',
                'phone' => '081234567896',
            ],
            [
                'id' => 13,
                'firstname' => 'Muh. Akbar',
                'lastname' => 'Razak',
                'username' => 'akbar',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'akbar.razak@example.com',
                'phone' => '081234567897',
            ],
            [
                'id' => 14,
                'firstname' => 'Abdul',
                'lastname' => 'Gaffar',
                'username' => 'gaffar',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'abdul.gaffar@example.com',
                'phone' => '081234567898',
            ],
            [
                'id' => 16,
                'firstname' => 'Sys',
                'lastname' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'type' => 0,
                'email' => 'sys.admin@example.com',
                'phone' => '081234567899',
            ],
            [
                'id' => 17,
                'firstname' => 'Muh',
                'lastname' => 'Idrus',
                'username' => 'idrus',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'muh.idrus@example.com',
                'phone' => '081234567800',
            ],
            [
                'id' => 18,
                'firstname' => 'Nirhabia',
                'lastname' => '-',
                'username' => 'bia',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'nirhabia@example.com',
                'phone' => '081234567801',
            ],
            [
                'id' => 19,
                'firstname' => 'Arief',
                'lastname' => 'Mahdan',
                'username' => 'arief',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'arief.mahdan@example.com',
                'phone' => '081234567802',
            ],
            [
                'id' => 20,
                'firstname' => 'Dudding',
                'lastname' => '-',
                'username' => 'dudding',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'dudding@example.com',
                'phone' => '081234567803',
            ],
            [
                'id' => 21,
                'firstname' => 'Andi',
                'lastname' => 'Saputra',
                'username' => 'andi',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'andi.saputra@example.com',
                'phone' => '081234567804',
            ],
            [
                'id' => 22,
                'firstname' => 'Farid',
                'lastname' => '-',
                'username' => 'farid',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'farid@example.com',
                'phone' => '081234567805',
            ],
            [
                'id' => 23,
                'firstname' => 'Syamsinar',
                'lastname' => 'Yusuf',
                'username' => 'sinar',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'syamsinar.yusuf@example.com',
                'phone' => '081234567806',
            ],
            [
                'id' => 24,
                'firstname' => 'Ardiyansyah',
                'lastname' => '-',
                'username' => 'ardi',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'ardiyansyah@example.com',
                'phone' => '081234567807',
            ],
            [
                'id' => 25,
                'firstname' => 'Saldi',
                'lastname' => '-',
                'username' => 'saldi',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'saldi@example.com',
                'phone' => '081234567808',
            ],
            [
                'id' => 26,
                'firstname' => 'Gugun',
                'lastname' => '-',
                'username' => 'gugun',
                'password' => Hash::make('password'),
                'type' => 2,
                'email' => 'gugun@example.com',
                'phone' => '081234567809',
            ],
            [
                'id' => 27,
                'firstname' => 'Test',
                'lastname' => 'Test',
                'username' => 'test',
                'password' => Hash::make('password'),
                'type' => 0,
                'email' => 'test@example.com',
                'phone' => '081234567810',
            ],
        ];

        foreach ($users as $user) {
            // Hapus user lama dengan ID yang sama jika ada

            // Tambahkan user baru
            $newUser = User::create($user);

            // Assign role based on type
            switch ($user['type']) {
                case 0:
                    $newUser->assignRole('admin');
                    break;
                case 1:
                    $newUser->assignRole('manager');
                    break;
                case 2:
                    $newUser->assignRole('user');
                    break;
            }
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
