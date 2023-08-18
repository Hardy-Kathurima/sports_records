<?php

namespace App\Policies;

use App\Models\Player;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlayerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin','Player']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Player $player): bool
    {
        return $user->id === $player->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         // Check if the record already exists in the database.
        $existingPlayer = Player::where('user_id', $user->id)->first();

        if ($existingPlayer || auth()->user()->registration_type != "Player") {
            // The record already exists, so disable the create button.
            return false;
        }

    // The record does not exist, so allow the user to create a new record.
    return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Player $player): bool
    {
           // Check if the record already exists in the database.
           $existingPlayer = Player::where('user_id', $user->id)->first();

           if ($existingPlayer && auth()->user()->registration_type === "Player") {
               // The record already exists, so disable the create button.
               return true;
           }

       // The record does not exist, so allow the user to create a new record.
       return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Player $player): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Player $player): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Player $player): bool
    {
        //
    }
}
