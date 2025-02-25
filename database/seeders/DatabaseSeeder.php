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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'username'=>'Admin',
            'firstName' => 'Wilfred',
            'lastName' => 'Silayo',
            'role'=>'admin',
            'email' => 'wilfredsilayo99@gmail.com',
        ]);
    }
}
