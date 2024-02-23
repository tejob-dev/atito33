<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TexteJour;
use Illuminate\Auth\Access\HandlesAuthorization;

class TexteJourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the texteJour can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list textejours');
    }

    /**
     * Determine whether the texteJour can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function view(User $user, TexteJour $model)
    {
        return $user->hasPermissionTo('view textejours');
    }

    /**
     * Determine whether the texteJour can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create textejours');
    }

    /**
     * Determine whether the texteJour can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function update(User $user, TexteJour $model)
    {
        return $user->hasPermissionTo('update textejours');
    }

    /**
     * Determine whether the texteJour can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function delete(User $user, TexteJour $model)
    {
        return $user->hasPermissionTo('delete textejours');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete textejours');
    }

    /**
     * Determine whether the texteJour can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function restore(User $user, TexteJour $model)
    {
        return false;
    }

    /**
     * Determine whether the texteJour can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TexteJour  $model
     * @return mixed
     */
    public function forceDelete(User $user, TexteJour $model)
    {
        return false;
    }
}
