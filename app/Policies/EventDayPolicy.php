<?php

namespace App\Policies;

use App\Models\EventDay;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any eventDays.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('EventDays list');
    }

    /**
     * Determine whether the user can view the eventDay.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function view(User $user, EventDay $eventDay)
    {
        return $user->isAdmin() || $user->is($eventDay) || $user->hasPermissionTo('EventDays show');
    }

    /**
     * Determine whether the user can create eventDays.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('EventDays create');
    }

    /**
     * Determine whether the user can update the eventDay.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function update(User $user, EventDay $eventDay)
    {
        return (($user->isAdmin() || $user->is($eventDay)) || $user->hasPermissionTo('EventDays update')) && ! $this->trashed($eventDay);
    }

    /**
     * Determine whether the user can update the type of the eventDay.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function updateType(User $user, EventDay $eventDay)
    {
        return ($user->isAdmin() || $user->is($eventDay)) || $user->hasPermissionTo('EventDays update');
    }

    /**
     * Determine whether the user can delete the eventDay.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function delete(User $user, EventDay $eventDay)
    {
        return ($user->isAdmin() && $user->isNot($eventDay) || $user->hasPermissionTo('EventDays delete')) && ! $this->trashed($eventDay);
    }

    /**
     * Determine whether the user can view trashed eventDays.
     *
     * @param User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('EventDays delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function restore(User $user, EventDay $eventDay)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('EventDays delete')) && $this->trashed($eventDay);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param EventDay $eventDay
     * @return mixed
     */
    public function forceDelete(User $user, EventDay $eventDay)
    {
        return ($user->isAdmin() && $user->isNot($eventDay) || $user->hasPermissionTo('EventDays delete')) && $this->trashed($eventDay);
    }

    /**
     * Determine wither the given eventDay is trashed.
     *
     * @param $eventDay
     * @return bool
     */
    public function trashed($eventDay)
    {
        return $this->hasSoftDeletes() && method_exists($eventDay, 'trashed') && $eventDay->trashed();
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
            array_keys((new \ReflectionClass(EventDay::class))->getTraits())
        );
    }
}
