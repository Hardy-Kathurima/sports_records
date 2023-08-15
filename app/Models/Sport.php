<?php

namespace App\Models;

use App\Models\PlayerPosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function playerPositions()
    {
        return $this->hasMany(PlayerPosition::class);
    }
}
