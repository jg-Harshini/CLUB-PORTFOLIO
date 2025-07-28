<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional example user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ✅ Add HOD user: Deisy
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
