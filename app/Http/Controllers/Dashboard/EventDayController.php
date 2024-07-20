<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\EventDayRequest;
use App\Models\EventDay;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class EventDayController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * EventDayController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(EventDay::class, 'event_day');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $eventDays = EventDay::filter()->paginate();

        return view('dashboard.eventDays.index', compact('eventDays'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.eventDays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventDayRequest $request
     * @return RedirectResponse
     */
    public function store(EventDayRequest $request)
    {
        $eventDay = EventDay::create($request->validated());

        flash(trans('eventDays.messages.created'));

        return redirect()->route('dashboard.event-days.show', $eventDay);
    }

    /**
     * @param EventDay $eventDay
     * @return Application|Factory|View
     */
    public function show(EventDay $eventDay)
    {
        return view('dashboard.eventDays.show', compact('eventDay'));
    }

    /**
     * @param EventDay $eventDay
     * @return Application|Factory|View
     */
    public function edit(EventDay $eventDay)
    {
        return view('dashboard.eventDays.edit', compact('eventDay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventDayRequest $request
     * @param EventDay $eventDay
     * @return RedirectResponse
     */
    public function update(EventDayRequest $request, EventDay $eventDay)
    {
        $eventDay->update($request->validated());

        flash(trans('eventDays.messages.updated'));

        return redirect()->route('dashboard.event-days.show', $eventDay);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EventDay $eventDay
     * @return RedirectResponse
     *
     */
    public function destroy(EventDay $eventDay)
    {
        $eventDay->delete();

        flash(trans('eventDays.messages.deleted'));

        return redirect()->route('dashboard.event-days.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param EventDay $eventDay
     * @return RedirectResponse
     *
     */
    public function status(EventDay $eventDay)
    {
        $eventDay->setActiveStatus(true);

        flash(trans('eventDays.messages.updated'));

        return redirect()->route('dashboard.event-days.index');
    }

    /**
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', EventDay::class);

        $eventDays = EventDay::onlyTrashed()->paginate();

        return view('dashboard.eventDays.trashed', compact('eventDays'));
    }
}
