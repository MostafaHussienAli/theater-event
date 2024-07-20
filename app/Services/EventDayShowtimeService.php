<?php

namespace App\Services;

use App\Models\EventDayShowtime;
use App\Repositories\Contracts\EventDayRepositoryInterface;
use App\Repositories\Contracts\ShowtimeRepositoryInterface;
use App\Repositories\Contracts\MovieRepositoryInterface;
use App\Repositories\Contracts\EventDayShowtimeRepositoryInterface;

class EventDayShowtimeService
{
    protected $eventDayRepo;
    protected $showtimeRepo;
    protected $movieRepo;
    protected $eventDayShowtimeRepo;

    public function __construct(
        EventDayRepositoryInterface $eventDayRepo,
        ShowtimeRepositoryInterface $showtimeRepo,
        MovieRepositoryInterface $movieRepo,
        EventDayShowtimeRepositoryInterface $eventDayShowtimeRepo
    ) {
        $this->eventDayRepo = $eventDayRepo;
        $this->showtimeRepo = $showtimeRepo;
        $this->movieRepo = $movieRepo;
        $this->eventDayShowtimeRepo = $eventDayShowtimeRepo;
    }

    public function getFilteredEventDays()
    {
        return $this->eventDayRepo->getFilteredEventDays();
    }

    public function eventDayDates()
    {
        return $this->eventDayShowtimeRepo->eventDayDates();
    }

    public function eventDayShowtimes()
    {
        return $this->eventDayShowtimeRepo->eventDayShowtimes();
    }

    public function eventDayMovies()
    {
        return $this->eventDayShowtimeRepo->eventDayMovies();
    }

    public function getShowtimes()
    {
        return $this->showtimeRepo->getAll();
    }

    public function getMovies()
    {
        return $this->movieRepo->getAll();
    }

    public function getEventDayShowtimes()
    {
        return $this->eventDayShowtimeRepo->paginate();
    }

    public function create(array $data)
    {
        return $this->eventDayShowtimeRepo->create($data);
    }

    public function update(EventDayShowtime $eventDayShowtime, array $data)
    {
        return $this->eventDayShowtimeRepo->update($eventDayShowtime, $data);
    }

    public function delete(EventDayShowtime $eventDayShowtime)
    {
        return $this->eventDayShowtimeRepo->delete($eventDayShowtime);
    }

    public function setActiveStatus(EventDayShowtime $eventDayShowtime, bool $status)
    {
        return $this->eventDayShowtimeRepo->setActiveStatus($eventDayShowtime, $status);
    }

    public function getTrashed()
    {
        return $this->eventDayShowtimeRepo->getTrashed();
    }
}
