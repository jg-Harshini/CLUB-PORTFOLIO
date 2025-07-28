<?php

namespace Database\Seeders;
use App\Models\Department;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     \Illuminate\Support\Facades\DB::table('departments')->insert([
    ['id' => 1, 'name' => 'CSE'],
    ['id' => 2, 'name' => 'ECE'],
    ['id' => 3, 'name' => 'EEE'],
    ['id' => 4, 'name' => 'IT'],
]);

    // ✅ Seed example superadmin user
    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
        'role' => 'superadmin',
        'department_id' => null,
        'club_id' => null,
    ]);

    // ✅ Seed Deisy (HOD of IT dept)
    User::create([
        'name' => 'Deisy',
        'email' => 'deisy@tce.edu',
        'password' => bcrypt('hodit'),
        'role' => 'hod',
        'department_id' => 4,
        'club_id' => null,
    ]);
    }
}
