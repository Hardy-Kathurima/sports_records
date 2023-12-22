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
        $userRoleMappings1 = [
            'Admin' => 'Admin',
            'Player' => 'Player',
            'Referee' => 'Referee',
            'Team official' => 'Team official',
            'Tournament official' => 'Tournament official',
            'Team admin' => 'Team admin'
        ];

        foreach ($userRoleMappings1 as $name => $roleName) {
            $user = User::factory()->create([
                'name' => $name,
                'registration_type' => $roleName,
                'email' => strtolower(str_replace(' ', '', $name)) . '@gmail.com',
            ]);

            $role = Role::create(['name' => $roleName]);
            $user->assignRole($role);
        }


       $teamOfficial2 =  User::factory()->create([

            'name'=>'Team Official 2',
            'registration_type'=> 'Team official',
            'email'=> 'teamofficial2@gmail.com'
        ]);


        $teamOfficial2->assignRole('Team official');


        $teamOfficial3 =  User::factory()->create([

            'name'=>'Team Official 3',
            'registration_type'=> 'Team official',
            'email'=> 'teamofficial3@gmail.com'
        ]);


        $teamOfficial3->assignRole('Team official');

        $teamOfficial4 =  User::factory()->create([

            'name'=>'Team Official 4',
            'registration_type'=> 'Team official',
            'email'=> 'teamofficial4@gmail.com'
        ]);

        
        $teamOfficial4->assignRole('Team official');


    }
}
