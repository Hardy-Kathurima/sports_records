<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'type_of_sport',
        'member',
        'age',
        'height',
        'weight'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
