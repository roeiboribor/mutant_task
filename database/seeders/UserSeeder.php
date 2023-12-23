<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@mutant.ae',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User 001',
            'email' => 'user@mutant.ae',
        ]);

        $users = \App\Models\User::get();

        $users[0]->assignRole('admin');
        $users[1]->assignRole('user');

        $randomUsers = \App\Models\User::factory(10)->create();

        // Assign Default Role to randomUsers
        foreach ($randomUsers as $fakeUser) {
            $fakeUser->assignRole('user');
        }
    }
}
