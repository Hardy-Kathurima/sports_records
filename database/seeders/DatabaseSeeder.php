<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\TypeOfSportSeeder;
use Database\Seeders\PlayerPositionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            UserSeeder::class,
            PlayerPositionSeeder::class,
            TypeOfSportSeeder::class,
        ]);

    }
}
