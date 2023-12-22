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

        \App\Models\User::first()->assignRole('admin');

        $randomUsers = \App\Models\User::factory(10)->create();

        // Assign Default Role to randomUsers
        foreach ($randomUsers as $fakeUser) {
            $fakeUser->assignRole('user');
        }
    }
}
