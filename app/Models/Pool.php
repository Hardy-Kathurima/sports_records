<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pool extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'groups' => 'array',
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class, 'pool_id', 'id');
    }
}
