<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ShowtimeFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'start_time',
        'end_time',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function startTime($value)
    {
        if ($value) {
            return $this->builder->where('start_time', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function endTime($value)
    {
        if ($value) {
            return $this->builder->where('end_time', $value);
        }

        return $this->builder;
    }
}
