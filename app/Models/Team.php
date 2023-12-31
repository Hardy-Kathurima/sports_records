<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $casts = [
        'team_players' => 'array',
        'team_officials' => 'array',
    ];

    protected $guarded = [];
}
