<?php

namespace Database\Seeders;

use App\Models\ProjectList;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProjectListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua pengguna dengan peran 'manager'
        $managerRole = Role::where('name', 'manager')->first();
        $managers = User::role($managerRole)->pluck('id')->toArray();

        if (empty($managers)) {
            $this->command->info('No managers found. Please create users with the manager role first.');
            return;
        }

        // Ambil semua ID pengguna
        $userIds = User::pluck('id')->toArray();

        // Buat project baru dengan data acak
        for ($i = 0; $i < 20; $i++) { // Buat 10 project sebagai contoh
            // Pilih manager_id secara acak dari daftar ID pengguna dengan role manager
            $managerId = $managers[array_rand($managers)];

            // Pilih 3 user_ids secara acak dari daftar ID pengguna dan gabungkan menjadi string
            $randomUserIds = array_rand($userIds, 3);
            $userIdsString = implode(',', array_map(function ($index) use ($userIds) {
                return $userIds[$index];
            }, $randomUserIds));

            ProjectList::create([
                'name' => 'Sample Project ' . ($i + 1),
                'description' => 'Description of project ' . ($i + 1),
                'status' => rand(0, 1),
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'user_id' => $managerId,
                'user_ids' => $userIdsString,
                'po_number' => 'PO' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'payment_status' => rand(0, 2),
                'payment' => rand(1000, 10000),
                'pembayaran' => rand(0, 1),
                'vendor' => rand(1, 4),
                'fakturpajak' => 'FP' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'fp_date' => now()->addDays(rand(1, 30)),
                'invoice' => 'INV' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'inv_date' => now(),
            ]);
        }
    }
}
