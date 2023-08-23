<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      $user1 =  User::factory()->create([
            'name' => 'Admin',
            'registration_type'=>'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $user2 =  User::factory()->create([
            'name' => 'Player',
            'registration_type'=>'Player',
            'email' => 'player@gmail.com',
        ]);


        $user3 =  User::factory()->create([
            'name' => 'Referee',
            'registration_type'=>'Referee',
            'email' => 'referee@gmail.com',
        ]);


        $user4 =  User::factory()->create([
            'name' => 'Team official',
            'registration_type'=>'Team official',
            'email' => 'teamOfficial@gmail.com',
        ]);

        $user5 =  User::factory()->create([
            'name' => 'Tournament official',
            'registration_type'=>'Tournament official',
            'email' => 'tournamentOfficial@gmail.com',
        ]);

        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Player']);
        $role3 = Role::create(['name'=> 'Referee']);
        $role4 = Role::create(['name'=> 'Team official']);
        $role5 = Role::create(['name'=> 'Tournament official']);

        $user1->assignRole($role1);
        $user2->assignRole($role2);
        $user3->assignRole($role3);
        $user4->assignRole($role4);
        $user5->assignRole($role5);

    }
}
