<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\SelectResources\EventDaySelectResource;
use App\Http\Resources\SelectResources\MovieSelectResource;
use App\Http\Resources\SelectResources\ShowtimeSelectResource;
use App\Models\EventDay;
use App\Models\EventDayShowtime;
use App\Models\Movie;
use App\Models\Showtime;
use App\Repositories\Contracts\EventDayShowtimeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EventDayShowtimeRepository implements EventDayShowtimeRepositoryInterface
{
    public function paginate()
    {
        return EventDayShowtime::filter()->paginate();
    }

    public function create(array $data)
    {
        return EventDayShowtime::create($data);
    }

    public function update(EventDayShowtime $eventDayShowtime, array $data)
    {
        return $eventDayShowtime->update($data);
    }

    public function delete(EventDayShowtime $eventDayShowtime)
    {
        return $eventDayShowtime->delete();
    }

    public function setActiveStatus(EventDayShowtime $eventDayShowtime, bool $status)
    {
        return $eventDayShowtime->setActiveStatus($status);
    }

    public function getTrashed()
    {
        return EventDayShowtime::onlyTrashed()->paginate();
    }

    public function eventDayDates()
    {
        $today = now()->startOfDay();
        $nextWeek = now()->addDays(7)->endOfDay();

        $eventDayIds = EventDayShowtime::with('eventDay')
            ->whereHas('eventDay', function ($query) use ($nextWeek, $today) {
                return $query->whereBetween('date', [$today, $nextWeek]);
            })->pluck('event_day_id');

        return EventDay::whereIn('id', $eventDayIds)->pluck('date', 'id');
    }

    public function eventDayShowtimes()
    {
        $showtimesIds = EventDayShowtime::where('event_day_id', request()->event_day_id)->pluck('showtime_id');
        return ShowtimeSelectResource::collection(Showtime::whereIn('id', $showtimesIds)->get());
    }

    public function eventDayMovies()
    {
        $moviesIds = EventDayShowtime::where('event_day_id', request()->event_day_id)
            ->where('showtime_id', request()->showtime_id)->pluck('movie_id');
        return MovieSelectResource::collection(Movie::whereIn('id', $moviesIds)->get());
    }
}
