<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\EventDayRepositoryInterface;
use App\Repositories\Eloquent\EventDayRepository;
use App\Repositories\Contracts\ShowtimeRepositoryInterface;
use App\Repositories\Eloquent\ShowtimeRepository;
use App\Repositories\Contracts\MovieRepositoryInterface;
use App\Repositories\Eloquent\MovieRepository;
use App\Repositories\Contracts\EventDayShowtimeRepositoryInterface;
use App\Repositories\Eloquent\EventDayShowtimeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventDayRepositoryInterface::class, EventDayRepository::class);
        $this->app->bind(ShowtimeRepositoryInterface::class, ShowtimeRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(EventDayShowtimeRepositoryInterface::class, EventDayShowtimeRepository::class);
    }
}
