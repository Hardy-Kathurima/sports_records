<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User;
use App\Models\Player;
use App\Models\Referee;
// use Filament\Models\Contracts\FilamentUser;
use App\Models\TeamOfficial;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TournamentOfficial;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'creator_id',
        'registration_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function player()
    {
        return $this->hasOne(Player::class);
    }
    public function referee()
    {
        return $this->hasOne(Referee::class);
    }
    public function teamOfficial()
    {
        return $this->hasOne(TeamOfficial::class);
    }
    public function tournamentOfficial()
    {
        return $this->hasOne(TournamentOfficial::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function createdUsers()
    {
        return $this->hasMany(User::class, 'creator_id');
    }

    // public function canAccessFilament(): bool
    // {
    //     // return $this->hasRole('Admin');
    //     return true;
    // }
}
