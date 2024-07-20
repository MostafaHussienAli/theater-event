<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface EventDayRepositoryInterface
{
    public function getFilteredEventDays();
}
