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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Dhruv',
            'email' => 'dhruv@example.com',
            'password'=>bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Lakkad',
            'email' => 'lakkad@example.com',
            'password'=>bcrypt('87654321'),
        ]);
    }
}
//Client ID ..................................................................................................................... 1  
//Client secret .......................................................................... poAbUcbBPiDd0YW7rR6YqMQIWPn9H8tSSQ3JMIcU  