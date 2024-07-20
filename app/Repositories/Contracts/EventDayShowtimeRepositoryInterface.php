<?php

namespace App\Repositories\Contracts;

use App\Models\EventDayShowtime;
use Illuminate\Database\Eloquent\Collection;

interface EventDayShowtimeRepositoryInterface
{
    public function paginate();
    public function create(array $data);
    public function update(EventDayShowtime $eventDayShowtime, array $data);
    public function delete(EventDayShowtime $eventDayShowtime);
    public function setActiveStatus(EventDayShowtime $eventDayShowtime, bool $status);
    public function getTrashed();
    public function eventDayDates();
    public function eventDayShowtimes();
    public function eventDayMovies();
}
