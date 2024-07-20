<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class EventDayFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'date',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return Builder
     */
    protected function date($value)
    {
        if ($value) {
            return $this->builder->where('date', $value);
        }

        return $this->builder;
    }
}
