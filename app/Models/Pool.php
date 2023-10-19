<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'confirmed_teams' => 'array',
    ];
}
