<?php

namespace App\Policies;

use App\Models\EventDayShowtime;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDayShowtimePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any eventDayShowtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('EventDayShowtimes list');
    }

    /**
     * Determine whether the user can view the eventDayShowtime.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function view(User $user, EventDayShowtime $eventDayShowtime)
    {
        return $user->isAdmin() || $user->is($eventDayShowtime) || $user->hasPermissionTo('EventDayShowtimes show');
    }

    /**
     * Determine whether the user can create eventDayShowtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('EventDayShowtimes create');
    }

    /**
     * Determine whether the user can update the eventDayShowtime.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function update(User $user, EventDayShowtime $eventDayShowtime)
    {
        return (($user->isAdmin() || $user->is($eventDayShowtime)) || $user->hasPermissionTo('EventDayShowtimes update')) && ! $this->trashed($eventDayShowtime);
    }

    /**
     * Determine whether the user can update the type of the eventDayShowtime.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function updateType(User $user, EventDayShowtime $eventDayShowtime)
    {
        return ($user->isAdmin() || $user->is($eventDayShowtime)) || $user->hasPermissionTo('EventDayShowtimes update');
    }

    /**
     * Determine whether the user can delete the eventDayShowtime.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function delete(User $user, EventDayShowtime $eventDayShowtime)
    {
        return ($user->isAdmin() && $user->isNot($eventDayShowtime) || $user->hasPermissionTo('EventDayShowtimes delete')) && ! $this->trashed($eventDayShowtime);
    }

    /**
     * Determine whether the user can view trashed eventDayShowtimes.
     *
     * @param User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('EventDayShowtimes delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function restore(User $user, EventDayShowtime $eventDayShowtime)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('EventDayShowtimes delete')) && $this->trashed($eventDayShowtime);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param EventDayShowtime $eventDayShowtime
     * @return mixed
     */
    public function forceDelete(User $user, EventDayShowtime $eventDayShowtime)
    {
        return ($user->isAdmin() && $user->isNot($eventDayShowtime) || $user->hasPermissionTo('EventDayShowtimes delete')) && $this->trashed($eventDayShowtime);
    }

    /**
     * Determine wither the given eventDayShowtime is trashed.
     *
     * @param $eventDayShowtime
     * @return bool
     */
    public function trashed($eventDayShowtime)
    {
        return $this->hasSoftDeletes() && method_exists($eventDayShowtime, 'trashed') && $eventDayShowtime->trashed();
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
            array_keys((new \ReflectionClass(EventDayShowtime::class))->getTraits())
        );
    }
}
