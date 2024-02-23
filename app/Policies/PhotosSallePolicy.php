<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PhotosSalle;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotosSallePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the photosSalle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list photossalles');
    }

    /**
     * Determine whether the photosSalle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function view(User $user, PhotosSalle $model)
    {
        return $user->hasPermissionTo('view photossalles');
    }

    /**
     * Determine whether the photosSalle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create photossalles');
    }

    /**
     * Determine whether the photosSalle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function update(User $user, PhotosSalle $model)
    {
        return $user->hasPermissionTo('update photossalles');
    }

    /**
     * Determine whether the photosSalle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function delete(User $user, PhotosSalle $model)
    {
        return $user->hasPermissionTo('delete photossalles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete photossalles');
    }

    /**
     * Determine whether the photosSalle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function restore(User $user, PhotosSalle $model)
    {
        return false;
    }

    /**
     * Determine whether the photosSalle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PhotosSalle  $model
     * @return mixed
     */
    public function forceDelete(User $user, PhotosSalle $model)
    {
        return false;
    }
}
