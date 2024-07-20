<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any movies.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Movies list');
    }

    /**
     * Determine whether the user can view the movie.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function view(User $user, Movie $movie)
    {
        return $user->isAdmin() || $user->is($movie) || $user->hasPermissionTo('Movies show');
    }

    /**
     * Determine whether the user can create movies.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Movies create');
    }

    /**
     * Determine whether the user can update the movie.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        return (($user->isAdmin() || $user->is($movie)) || $user->hasPermissionTo('Movies update')) && ! $this->trashed($movie);
    }

    /**
     * Determine whether the user can update the type of the movie.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function updateType(User $user, Movie $movie)
    {
        return ($user->isAdmin() || $user->is($movie)) || $user->hasPermissionTo('Movies update');
    }

    /**
     * Determine whether the user can delete the movie.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function delete(User $user, Movie $movie)
    {
        return ($user->isAdmin() && $user->isNot($movie) || $user->hasPermissionTo('Movies delete')) && ! $this->trashed($movie);
    }

    /**
     * Determine whether the user can view trashed movies.
     *
     * @param User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Movies delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function restore(User $user, Movie $movie)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Movies delete')) && $this->trashed($movie);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function forceDelete(User $user, Movie $movie)
    {
        return ($user->isAdmin() && $user->isNot($movie) || $user->hasPermissionTo('Movies delete')) && $this->trashed($movie);
    }

    /**
     * Determine wither the given movie is trashed.
     *
     * @param $movie
     * @return bool
     */
    public function trashed($movie)
    {
        return $this->hasSoftDeletes() && method_exists($movie, 'trashed') && $movie->trashed();
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
            array_keys((new \ReflectionClass(Movie::class))->getTraits())
        );
    }
}
