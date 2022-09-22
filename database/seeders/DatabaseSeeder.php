<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user1 = User::factory()->create(['name' => 'Joe Doe']);
        $user2 = User::factory()->create(['name' => 'Anny Doe']);

        Todo::factory()->count(5)->create(['user_id' => $user1->id]);
        Todo::factory()->count(5)->create(['user_id' => $user2->id]);
    }
}
