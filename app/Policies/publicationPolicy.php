<?php

namespace App\Policies;

use App\Models\profile;
use App\Models\User;
use App\Models\publication;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class publicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // all items
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, publication $publication): bool
    {
        // item
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(profile $profile, publication $publication): bool
    {
       return $profile->id === $publication->Profile_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $profile, publication $publication): bool
    {
       return $profile->id === $publication->Profile_id;
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, publication $publication): bool
    {
        // Pour delete defenitifment
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, publication $publication): bool
    {
        // Pour delete all 
    }


    // public function before(User $user)  {
        // echo "<br><br>before<br><br>";
        // return $user->isAdministrator();        
    // }// Pour test si toue les users sont des Admin pour(edit ,delete ....)
}
