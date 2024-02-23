<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Visite;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the visite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list visites');
    }

    /**
     * Determine whether the visite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function view(User $user, Visite $model)
    {
        return $user->hasPermissionTo('view visites');
    }

    /**
     * Determine whether the visite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create visites');
    }

    /**
     * Determine whether the visite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function update(User $user, Visite $model)
    {
        return $user->hasPermissionTo('update visites');
    }

    /**
     * Determine whether the visite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function delete(User $user, Visite $model)
    {
        return $user->hasPermissionTo('delete visites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete visites');
    }

    /**
     * Determine whether the visite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function restore(User $user, Visite $model)
    {
        return false;
    }

    /**
     * Determine whether the visite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visite  $model
     * @return mixed
     */
    public function forceDelete(User $user, Visite $model)
    {
        return false;
    }
}
