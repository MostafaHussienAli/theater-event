<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\ShowtimeRequest;
use App\Models\Showtime;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class ShowtimeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * ShowtimeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Showtime::class, 'showtime');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $showtimes = Showtime::filter()->paginate();

        return view('dashboard.showtimes.index', compact('showtimes'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.showtimes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShowtimeRequest $request
     * @return RedirectResponse
     */
    public function store(ShowtimeRequest $request)
    {
        $showtime = Showtime::create($request->validated());

        flash(trans('showtimes.messages.created'));

        return redirect()->route('dashboard.showtimes.show', $showtime);
    }

    /**
     * @param Showtime $showtime
     * @return Application|Factory|View
     */
    public function show(Showtime $showtime)
    {
        return view('dashboard.showtimes.show', compact('showtime'));
    }

    /**
     * @param Showtime $showtime
     * @return Application|Factory|View
     */
    public function edit(Showtime $showtime)
    {
        return view('dashboard.showtimes.edit', compact('showtime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShowtimeRequest $request
     * @param Showtime $showtime
     * @return RedirectResponse
     */
    public function update(ShowtimeRequest $request, Showtime $showtime)
    {
        $showtime->update($request->validated());

        flash(trans('showtimes.messages.updated'));

        return redirect()->route('dashboard.showtimes.show', $showtime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Showtime $showtime
     * @return RedirectResponse
     *
     */
    public function destroy(Showtime $showtime)
    {
        $showtime->delete();

        flash(trans('showtimes.messages.deleted'));

        return redirect()->route('dashboard.showtimes.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Showtime $showtime
     * @return RedirectResponse
     *
     */
    public function status(Showtime $showtime)
    {
        $showtime->setActiveStatus(true);

        flash(trans('showtimes.messages.updated'));

        return redirect()->route('dashboard.showtimes.index');
    }

    /**
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Showtime::class);

        $showtimes = Showtime::onlyTrashed()->paginate();

        return view('dashboard.showtimes.trashed', compact('showtimes'));
    }
}
