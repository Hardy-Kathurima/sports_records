<?php

namespace Database\Seeders;

use App\Models\TypeOfSport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeOfSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sportNames = [
            'Football',
            'Volleyball',
            'Handball',
            'Basketball',
            'Rugby',
        ];

        foreach ($sportNames as $sportName) {
            TypeOfSport::create([
                'name' => $sportName,
            ]);
        }
    }
}
