<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any attendees.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Attendees list');
    }

    /**
     * Determine whether the user can view the attendee.
     *
     * @return mixed
     */
    public function view(User $user, Attendee $attendee)
    {
        return $user->isAdmin() || $user->is($attendee) || $user->hasPermissionTo('Attendees show');
    }

    /**
     * Determine whether the user can create attendees.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Attendees create');
    }

    /**
     * Determine whether the user can update the attendee.
     *
     * @return mixed
     */
    public function update(User $user, Attendee $attendee)
    {
        return (($user->isAdmin() || $user->is($attendee)) || $user->hasPermissionTo('Attendees update')) && ! $this->trashed($attendee);
    }

    /**
     * Determine whether the user can update the type of the attendee.
     *
     * @return mixed
     */
    public function updateType(User $user, Attendee $attendee)
    {
        return ($user->isAdmin() || $user->is($attendee)) || $user->hasPermissionTo('Attendees update');
    }

    /**
     * Determine whether the user can delete the attendee.
     *
     * @return mixed
     */
    public function delete(User $user, Attendee $attendee)
    {
        return ($user->isAdmin() && $user->isNot($attendee) || $user->hasPermissionTo('Attendees delete')) && ! $this->trashed($attendee);
    }

    /**
     * Determine whether the user can view trashed attendees.
     *
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Attendees delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Attendee $attendee)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Attendees delete')) && $this->trashed($attendee);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Attendee $attendee)
    {
        return ($user->isAdmin() && $user->isNot($attendee) || $user->hasPermissionTo('Attendees delete')) && $this->trashed($attendee);
    }

    /**
     * Determine wither the given attendee is trashed.
     *
     * @return bool
     */
    public function trashed($attendee)
    {
        return $this->hasSoftDeletes() && method_exists($attendee, 'trashed') && $attendee->trashed();
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
            array_keys((new \ReflectionClass(Attendee::class))->getTraits())
        );
    }
}
