<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\SelectFilter;
use App\Http\Resources\LanguageResource;
use App\Http\Resources\SelectResources\EventDaySelectResource;
use App\Http\Resources\SelectResources\CategorySelectResource;
use App\Http\Resources\SelectResources\CitySelectResource;
use App\Http\Resources\SelectResources\CountrySelectResource;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\EventDayShowtime;
use App\Models\Language;
use App\Services\EventDayShowtimeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SelectController extends Controller
{
    private $eventDayShowtimeService;

    public function __construct(EventDayShowtimeService $eventDayShowtimeService)
    {
        $this->eventDayShowtimeService = $eventDayShowtimeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function eventDayDates()
    {
        return $this->eventDayShowtimeService->eventDayDates();
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function eventDayShowtimes()
    {
        return $this->eventDayShowtimeService->eventDayShowtimes();
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function eventDayMovies()
    {
        return $this->eventDayShowtimeService->eventDayMovies();
    }
}
