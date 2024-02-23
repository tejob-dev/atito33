<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VideoSalle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoSallePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the videoSalle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list videosalles');
    }

    /**
     * Determine whether the videoSalle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function view(User $user, VideoSalle $model)
    {
        return $user->hasPermissionTo('view videosalles');
    }

    /**
     * Determine whether the videoSalle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create videosalles');
    }

    /**
     * Determine whether the videoSalle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function update(User $user, VideoSalle $model)
    {
        return $user->hasPermissionTo('update videosalles');
    }

    /**
     * Determine whether the videoSalle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function delete(User $user, VideoSalle $model)
    {
        return $user->hasPermissionTo('delete videosalles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete videosalles');
    }

    /**
     * Determine whether the videoSalle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function restore(User $user, VideoSalle $model)
    {
        return false;
    }

    /**
     * Determine whether the videoSalle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VideoSalle  $model
     * @return mixed
     */
    public function forceDelete(User $user, VideoSalle $model)
    {
        return false;
    }
}
