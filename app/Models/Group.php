<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    use HasFactory;

    protected static $unguarded = [];

    public function pool(): BelongsTo
    {
        return $this->belongsTo(Pool::class, 'pool_id', 'id');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id', 'team_official_id');
    }

    public function scopeTeamIds($query)
    {
        return $query->where('group_name', $this->group_name);
    }
}
