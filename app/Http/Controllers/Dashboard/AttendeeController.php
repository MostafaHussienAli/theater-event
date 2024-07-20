<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\AttendeeRequest;
use App\Models\Attendee;
use App\Services\EventDayShowtimeService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class AttendeeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    private $eventDayShowtimeService;

    /**
     * AttendeeController constructor.
     * @param EventDayShowtimeService $eventDayShowtimeService
     */
    public function __construct(EventDayShowtimeService $eventDayShowtimeService)
    {
        $this->eventDayShowtimeService = $eventDayShowtimeService;
        $this->authorizeResource(Attendee::class, 'attendee');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $eventDays = $this->eventDayShowtimeService->getFilteredEventDays();
        $showtimes = $this->eventDayShowtimeService->getShowtimes();
        $movies = $this->eventDayShowtimeService->getMovies();
        $attendees = Attendee::filter()->paginate();

        return view('dashboard.attendees.index', compact('attendees', 'eventDays', 'showtimes', 'movies'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $eventDays = $this->eventDayShowtimeService->eventDayDates();
        $showtimes = $this->eventDayShowtimeService->eventDayShowtimes();
        $movies = $this->eventDayShowtimeService->eventDayMovies();

        return view('dashboard.attendees.create', compact('eventDays', 'showtimes', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttendeeRequest $request
     * @return RedirectResponse
     */
    public function store(AttendeeRequest $request)
    {
        $attendee = Attendee::create($request->validated());

        flash(trans('attendees.messages.created'));

        return redirect()->route('dashboard.attendees.show', $attendee);
    }

    /**
     * @param Attendee $attendee
     * @return Application|Factory|View
     */
    public function show(Attendee $attendee)
    {
        return view('dashboard.attendees.show', compact('attendee'));
    }

    /**
     * @param Attendee $attendee
     * @return Application|Factory|View
     */
    public function edit(Attendee $attendee)
    {
        $eventDays = $this->eventDayShowtimeService->eventDayDates();
        $showtimes = $this->eventDayShowtimeService->eventDayShowtimes();
        $movies = $this->eventDayShowtimeService->eventDayMovies();

        return view('dashboard.attendees.edit', compact('attendee', 'eventDays', 'showtimes', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttendeeRequest $request
     * @param Attendee $attendee
     * @return RedirectResponse
     */
    public function update(AttendeeRequest $request, Attendee $attendee)
    {
        $attendee->update($request->validated());

        flash(trans('attendees.messages.updated'));

        return redirect()->route('dashboard.attendees.show', $attendee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendee $attendee
     * @return RedirectResponse
     *
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        flash(trans('attendees.messages.deleted'));

        return redirect()->route('dashboard.attendees.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Attendee $attendee
     * @return RedirectResponse
     *
     */
    public function status(Attendee $attendee)
    {
        $attendee->setActiveStatus(true);

        flash(trans('attendees.messages.updated'));

        return redirect()->route('dashboard.attendees.index');
    }

    /**
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Attendee::class);

        $attendees = Attendee::onlyTrashed()->paginate();

        return view('dashboard.attendees.trashed', compact('attendees'));
    }
}
