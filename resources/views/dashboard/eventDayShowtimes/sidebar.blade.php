@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\EventDayShowtime::class])
    @slot('url', route('dashboard.event-day-showtimes.index'))
    @slot('name', trans('eventDayShowtimes.plural'))
    @slot('active', request()->routeIs('*event-day-showtimes*'))
    @slot('icon', 'fas fa-calendar')
    @slot('tree', [
        [
            'name' => trans('eventDayShowtimes.actions.list'),
            'url' => route('dashboard.event-day-showtimes.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\EventDayShowtime::class],
            'active' => request()->routeIs('*event-day-showtimes.index') || request()->routeIs('*event-day-showtimes.show')
        ],
        [
            'name' => trans('eventDayShowtimes.actions.create'),
            'url' => route('dashboard.event-day-showtimes.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\EventDayShowtime::class],
            'active' => request()->routeIs('*event-day-showtimes.create'),
        ],
    ])
@endcomponent
