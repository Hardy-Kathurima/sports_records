<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tournament;
use App\Models\TournamentOfficial;
use Illuminate\Auth\Access\Response;

class TournamentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tournament $tournament): bool
    {
        return $user->hasRole(['Tournament official','Admin','Referee','Player','Team official']);

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $tournamentOfficial = TournamentOfficial::where('user_id', auth()->user()->id)->first();
        if($tournamentOfficial){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tournament $tournament): bool
    {

        if($tournament->tournament_creator === $user->id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tournament $tournament): bool
    {
        $tournamentOfficial = TournamentOfficial::where('user_id', auth()->user()->id)->first();
        if($tournamentOfficial){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tournament $tournament): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tournament $tournament): bool
    {
        //
    }
}
