<?php

namespace App\Models;

use App\Models\TypeOfSport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'position'
    ];
    public function typeOfSport()
    {
        return $this->belongsTo(TypeOfSport::class);
    }
}
