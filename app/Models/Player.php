<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'type_of_sport',
        'player_position',
        'age',
        'height',
        'weight'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
