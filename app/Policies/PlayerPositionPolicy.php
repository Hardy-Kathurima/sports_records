<?php

namespace App\Policies;

use App\Models\PlayerPosition;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlayerPositionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin');
        // return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PlayerPosition $playerPosition): bool
    {
        // return $user->hasRole('Admin');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PlayerPosition $playerPosition): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PlayerPosition $playerPosition): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PlayerPosition $playerPosition): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PlayerPosition $playerPosition): bool
    {
        //
    }
}
