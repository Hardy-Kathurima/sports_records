<?php

namespace App\Policies;

use App\Models\TeamOfficial;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamOfficialPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Team official']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TeamOfficial $teamOfficial): bool
    {
        return $user->id === $teamOfficial->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         // Check if the record already exists in the database.
         $existingTeamOfficial = TeamOfficial::where('user_id', $user->id)->first();

         if ($existingTeamOfficial|| auth()->user()->registration_type != "Team official") {
             // The record already exists, so disable the create button.
             return false;
         }

     // The record does not exist, so allow the user to create a new record.
     return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TeamOfficial $teamOfficial): bool
    {
         // Check if the record already exists in the database.
         $existingTeamOfficial = TeamOfficial::where('user_id', $user->id)->first();

         if ($existingTeamOfficial && auth()->user()->registration_type === "Team official") {
             // The record already exists, so disable the create button.
             return true;
         }

     // The record does not exist, so allow the user to create a new record.
     return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TeamOfficial $teamOfficial): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TeamOfficial $teamOfficial): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TeamOfficial $teamOfficial): bool
    {
        //
    }
}
