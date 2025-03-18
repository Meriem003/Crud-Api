<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::insert([
            ['name' => 'Admin'],
            ['name' => 'Editor'],
            ['name' => 'User'],
        ]);
        User::factory(5)->create()->each(function ($user) {
            $user->roles()->attach(Role::inRandomOrder()->first()->id);
        });
    }
}
