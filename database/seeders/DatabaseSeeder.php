<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'fawaz',
        //     'username' => 'fwzhrn',
            
        // ]);
        DB::table('users')->insert([
        'name' => 'Admin',
        'username' => 'admin',
        'password' => bcrypt('admin123'),
        'level' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}
