<?php

namespace Database\Seeders;

use App\Models\PlayerPosition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Defender',
            'Forward',
            'Striker',
            'Goalkeeper',
            'Hooker',
            'Center',
        ];

        foreach ($positions as $position) {
            PlayerPosition::create([
                'position' => $position,
            ]);
        }
    }
}
