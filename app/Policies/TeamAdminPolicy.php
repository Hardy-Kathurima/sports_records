<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TeamOfficial;

class TeamAdminPolicy
{
     /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Referee','Team official','Tournament official','Admin','Player','Team admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Team $team): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $teamOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
        if($teamOfficial){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Team $team): bool
    {
         $teamOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
        if($teamOfficial){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Team $team): bool
    {
        return $user->hasRole(['Team official','Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Team $team): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Team $team): bool
    {
        //
    }

}
