<?php

namespace App\Policies;

use App\Models\Referee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RefereePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Referee']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Referee $referee): bool
    {
        return $user->id === $referee->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Check if the record already exists in the database.
        $existingReferee = Referee::where('user_id', $user->id)->first();

        if ($existingReferee|| auth()->user()->registration_type != "Referee") {
            // The record already exists, so disable the create button.
            return false;
        }

    // The record does not exist, so allow the user to create a new record.
    return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Referee $referee): bool
    {
         // Check if the record already exists in the database.
         $existingReferee = Referee::where('user_id', $user->id)->first();

         if ($existingReferee && auth()->user()->registration_type === "Referee") {
             // The record already exists, so disable the create button.
             return true;
         }

     // The record does not exist, so allow the user to create a new record.
     return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Referee $referee): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Referee $referee): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Referee $referee): bool
    {
        //
    }
}
