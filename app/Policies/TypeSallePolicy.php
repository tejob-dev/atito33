<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeSalle;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeSallePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the typeSalle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list typesalles');
    }

    /**
     * Determine whether the typeSalle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function view(User $user, TypeSalle $model)
    {
        return $user->hasPermissionTo('view typesalles');
    }

    /**
     * Determine whether the typeSalle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create typesalles');
    }

    /**
     * Determine whether the typeSalle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function update(User $user, TypeSalle $model)
    {
        return $user->hasPermissionTo('update typesalles');
    }

    /**
     * Determine whether the typeSalle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function delete(User $user, TypeSalle $model)
    {
        return $user->hasPermissionTo('delete typesalles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete typesalles');
    }

    /**
     * Determine whether the typeSalle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function restore(User $user, TypeSalle $model)
    {
        return false;
    }

    /**
     * Determine whether the typeSalle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeSalle  $model
     * @return mixed
     */
    public function forceDelete(User $user, TypeSalle $model)
    {
        return false;
    }
}
