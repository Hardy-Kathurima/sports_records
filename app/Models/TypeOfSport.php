<?php

namespace App\Models;

use App\Models\PlayerPosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeOfSport extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'player_positions' => 'array',
    ];

    public function playerPositions()
    {
        return $this->hasMany(PlayerPosition::class);
    }
}
