<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\MovieRequest;
use App\Models\Movie;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class MovieController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * MovieController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Movie::class, 'movie');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $movies = Movie::filter()->paginate();

        return view('dashboard.movies.index', compact('movies'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MovieRequest $request
     * @return RedirectResponse
     */
    public function store(MovieRequest $request)
    {
        $movie = Movie::create($request->validated());

        flash(trans('movies.messages.created'));

        return redirect()->route('dashboard.movies.show', $movie);
    }

    /**
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function show(Movie $movie)
    {
        return view('dashboard.movies.show', compact('movie'));
    }

    /**
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MovieRequest $request
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->validated());

        flash(trans('movies.messages.updated'));

        return redirect()->route('dashboard.movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return RedirectResponse
     *
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        flash(trans('movies.messages.deleted'));

        return redirect()->route('dashboard.movies.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Movie $movie
     * @return RedirectResponse
     *
     */
    public function status(Movie $movie)
    {
        $movie->setActiveStatus(true);

        flash(trans('movies.messages.updated'));

        return redirect()->route('dashboard.movies.index');
    }

    /**
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Movie::class);

        $movies = Movie::onlyTrashed()->paginate();

        return view('dashboard.movies.trashed', compact('movies'));
    }
}
