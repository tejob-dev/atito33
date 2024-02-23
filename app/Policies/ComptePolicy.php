<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Compte;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComptePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the compte can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list comptes');
    }

    /**
     * Determine whether the compte can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function view(User $user, Compte $model)
    {
        return $user->hasPermissionTo('view comptes');
    }

    /**
     * Determine whether the compte can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create comptes');
    }

    /**
     * Determine whether the compte can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function update(User $user, Compte $model)
    {
        return $user->hasPermissionTo('update comptes');
    }

    /**
     * Determine whether the compte can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function delete(User $user, Compte $model)
    {
        return $user->hasPermissionTo('delete comptes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete comptes');
    }

    /**
     * Determine whether the compte can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function restore(User $user, Compte $model)
    {
        return false;
    }

    /**
     * Determine whether the compte can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Compte  $model
     * @return mixed
     */
    public function forceDelete(User $user, Compte $model)
    {
        return false;
    }
}
