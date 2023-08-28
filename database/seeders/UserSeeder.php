<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamOfficial;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRoleMappings = [
            'Admin' => 'Admin',
            'Player' => 'Player',
            'Referee' => 'Referee',
            'Team official' => 'Team official',
            'Tournament official' => 'Tournament official',
            'Team admin' => 'Team admin'
        ];

        foreach ($userRoleMappings as $name => $roleName) {
            $user = User::factory()->create([
                'name' => $name,
                'registration_type' => $roleName,
                'email' => strtolower(str_replace(' ', '', $name)) . '@gmail.com',
            ]);

            $role = Role::create(['name' => $roleName]);
            $user->assignRole($role);
        }

    }
}
