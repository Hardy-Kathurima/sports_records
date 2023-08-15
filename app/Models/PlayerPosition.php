<?php

namespace App\Models;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
