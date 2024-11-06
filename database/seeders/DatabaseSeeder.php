<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create()
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        $garden_owner = User::create([
            'name' => 'Garden Owner',
            'email' => 'gardenowner@owner.com',
            'role' => 'garden_owner',
            'password' => bcrypt('password'),
        ]);

        $garden_owner->garden()->create([
            'name' => 'Garden',
            'location' => 'Location',
            'description' => 'Description',
        ]);
    }
}
