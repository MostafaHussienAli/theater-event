<?php

namespace App\Policies;

use App\Models\Showtime;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShowtimePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any showtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Showtimes list');
    }

    /**
     * Determine whether the user can view the showtime.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function view(User $user, Showtime $showtime)
    {
        return $user->isAdmin() || $user->is($showtime) || $user->hasPermissionTo('Showtimes show');
    }

    /**
     * Determine whether the user can create showtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Showtimes create');
    }

    /**
     * Determine whether the user can update the showtime.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function update(User $user, Showtime $showtime)
    {
        return (($user->isAdmin() || $user->is($showtime)) || $user->hasPermissionTo('Showtimes update')) && ! $this->trashed($showtime);
    }

    /**
     * Determine whether the user can update the type of the showtime.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function updateType(User $user, Showtime $showtime)
    {
        return ($user->isAdmin() || $user->is($showtime)) || $user->hasPermissionTo('Showtimes update');
    }

    /**
     * Determine whether the user can delete the showtime.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function delete(User $user, Showtime $showtime)
    {
        return ($user->isAdmin() && $user->isNot($showtime) || $user->hasPermissionTo('Showtimes delete')) && ! $this->trashed($showtime);
    }

    /**
     * Determine whether the user can view trashed showtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Showtimes delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function restore(User $user, Showtime $showtime)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Showtimes delete')) && $this->trashed($showtime);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Showtime $showtime
     * @return mixed
     */
    public function forceDelete(User $user, Showtime $showtime)
    {
        return ($user->isAdmin() && $user->isNot($showtime) || $user->hasPermissionTo('Showtimes delete')) && $this->trashed($showtime);
    }

    /**
     * Determine wither the given showtime is trashed.
     *
     * @param $showtime
     * @return bool
     */
    public function trashed($showtime)
    {
        return $this->hasSoftDeletes() && method_exists($showtime, 'trashed') && $showtime->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Showtime::class))->getTraits())
        );
    }
}
