<?php

namespace App\Models;

use App\Models\TournamentOfficial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'goal' => 'array',
    ];

    public function tournamentOfficial()
    {
        return $this->belongsTo(TournamentOfficial::class);
    }
}
