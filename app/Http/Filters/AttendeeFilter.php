<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class AttendeeFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'mobile',
        'email',
        'event_day_id',
        'showtime_id',
        'movie_id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->where('name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function mobile($value)
    {
        if ($value) {
            return $this->builder->where('mobile', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function email($value)
    {
        if ($value) {
            return $this->builder->where('email', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function eventDayId($value)
    {
        if ($value) {
            return $this->builder->where('event_day_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function showtimeId($value)
    {
        if ($value) {
            return $this->builder->where('showtime_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function movieId($value)
    {
        if ($value) {
            return $this->builder->where('movie_id', $value);
        }

        return $this->builder;
    }
}