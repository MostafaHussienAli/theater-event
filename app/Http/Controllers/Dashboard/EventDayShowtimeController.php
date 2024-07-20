<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\EventDayShowtimeRequest;
use App\Http\Resources\EventDayShowtimeResource;
use App\Models\EventDayShowtime;
use App\Services\EventDayShowtimeService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class EventDayShowtimeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    private $eventDayShowtimeService;

    public function __construct(EventDayShowtimeService $eventDayShowtimeService)
    {
        $this->authorizeResource(EventDayShowtime::class, 'event_day_showtime');
        $this->eventDayShowtimeService = $eventDayShowtimeService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $eventDays = $this->eventDayShowtimeService->getFilteredEventDays();
        $showtimes = $this->eventDayShowtimeService->getShowtimes();
        $movies = $this->eventDayShowtimeService->getMovies();
        $eventDayShowtimes = EventDayShowtimeResource::collection($this->eventDayShowtimeService->getEventDayShowtimes());

        return view('dashboard.eventDayShowtimes.index', compact('eventDayShowtimes', 'eventDays', 'showtimes', 'movies'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $eventDays = $this->eventDayShowtimeService->getFilteredEventDays();
        $showtimes = $this->eventDayShowtimeService->getShowtimes();
        $movies = $this->eventDayShowtimeService->getMovies();

        return view('dashboard.eventDayShowtimes.create', compact('eventDays', 'showtimes', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventDayShowtimeRequest $request
     * @return RedirectResponse
     */
    public function store(EventDayShowtimeRequest $request)
    {
        $eventDayShowtime = $this->eventDayShowtimeService->create($request->validated());

        flash(trans('eventDayShowtimes.messages.created'));

        return redirect()->route('dashboard.event-day-showtimes.show', $eventDayShowtime);
    }

    /**
     * @param EventDayShowtime $eventDayShowtime
     * @return Application|Factory|View
     */
    public function show(EventDayShowtime $eventDayShowtime)
    {
        return view('dashboard.eventDayShowtimes.show', compact('eventDayShowtime'));
    }

    /**
     * @param EventDayShowtime $eventDayShowtime
     * @return Application|Factory|View
     */
    public function edit(EventDayShowtime $eventDayShowtime)
    {
        $eventDays = $this->eventDayShowtimeService->getFilteredEventDays();
        $showtimes = $this->eventDayShowtimeService->getShowtimes();
        $movies = $this->eventDayShowtimeService->getMovies();

        return view('dashboard.eventDayShowtimes.edit', compact('eventDayShowtime', 'eventDays', 'showtimes', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventDayShowtimeRequest $request
     * @param EventDayShowtime $eventDayShowtime
     * @return RedirectResponse
     */
    public function update(EventDayShowtimeRequest $request, EventDayShowtime $eventDayShowtime)
    {
        $this->eventDayShowtimeService->update($eventDayShowtime, $request->validated());

        flash(trans('eventDayShowtimes.messages.updated'));

        return redirect()->route('dashboard.event-day-showtimes.show', $eventDayShowtime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EventDayShowtime $eventDayShowtime
     * @return RedirectResponse
     */
    public function destroy(EventDayShowtime $eventDayShowtime)
    {
        $this->eventDayShowtimeService->delete($eventDayShowtime);

        flash(trans('eventDayShowtimes.messages.deleted'));

        return redirect()->route('dashboard.event-day-showtimes.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param EventDayShowtime $eventDayShowtime
     * @return RedirectResponse
     */
    public function status(EventDayShowtime $eventDayShowtime)
    {
        $this->eventDayShowtimeService->setActiveStatus($eventDayShowtime, true);

        flash(trans('eventDayShowtimes.messages.updated'));

        return redirect()->route('dashboard.event-day-showtimes.index');
    }

    /**
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', EventDayShowtime::class);

        $eventDayShowtimes = $this->eventDayShowtimeService->getTrashed();

        return view('dashboard.eventDayShowtimes.trashed', compact('eventDayShowtimes'));
    }
}
