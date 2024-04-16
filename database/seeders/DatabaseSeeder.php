<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CDocument;
use App\Models\CUser;
use App\Models\CUsersDocument;
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

        CUser::factory()->count(10)->create();
        CDocument::factory()->count(30)->create();
        CUsersDocument::factory()->count(40)->create();
    }
}
