<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\SelectResources\EventDaySelectResource;
use App\Models\EventDay;
use App\Models\EventDayShowtime;
use App\Models\Movie;
use App\Models\Showtime;
use App\Repositories\Contracts\EventDayRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EventDayRepository implements EventDayRepositoryInterface
{
    public function getFilteredEventDays()
    {
        $today = now()->startOfDay();
        $nextWeek = now()->addDays(7)->endOfDay();

        return EventDay::whereBetween('date', [$today, $nextWeek])->pluck('date', 'id');
    }
}
