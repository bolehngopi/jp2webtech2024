<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Club;
use App\Models\Nationality;
use App\Models\Player;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'username' => 'admin_jp2',
            'password' => bcrypt('admin_jp2'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'username' => 'user_jp2',
            'password' => bcrypt('user_jp2'),
            'role' => 'user'
        ]);

        Position::factory()->create([
            'name' => 'wing'
        ]);

        Club::factory()->create([
            'name' => 'Timnas',
            'descriptions' => 'A Indonesia nasional football club'
        ]);

        Nationality::factory()->create([
            'name' => 'Indonesia'
        ]);

        Player::factory(20)->create();
    }
}
