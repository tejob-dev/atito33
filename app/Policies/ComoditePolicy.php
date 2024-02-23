<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comodite;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComoditePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the comodite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list comodites');
    }

    /**
     * Determine whether the comodite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function view(User $user, Comodite $model)
    {
        return $user->hasPermissionTo('view comodites');
    }

    /**
     * Determine whether the comodite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create comodites');
    }

    /**
     * Determine whether the comodite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function update(User $user, Comodite $model)
    {
        return $user->hasPermissionTo('update comodites');
    }

    /**
     * Determine whether the comodite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function delete(User $user, Comodite $model)
    {
        return $user->hasPermissionTo('delete comodites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete comodites');
    }

    /**
     * Determine whether the comodite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function restore(User $user, Comodite $model)
    {
        return false;
    }

    /**
     * Determine whether the comodite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comodite  $model
     * @return mixed
     */
    public function forceDelete(User $user, Comodite $model)
    {
        return false;
    }
}
