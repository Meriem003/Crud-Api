<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->count(3)->sequence(
            ['name' => 'Admin'],
            ['name' => 'Editor'],
            ['name' => 'User']
        )->create();

        // Créer 5 utilisateurs avec un rôle aléatoire
        User::factory(5)->create()->each(function ($user) {
            $user->roles()->attach(Role::inRandomOrder()->first()->id);
        });
    }
}
