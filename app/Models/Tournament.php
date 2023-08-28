<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'tournament_teams' => 'array',
        'tournament_officials' => 'array',
        'tournament_referees' => 'array',
    ];

    public function tournamentOfficial()
    {
        return $this->belongsTo(TournamentOfficial::class);
    }

}
