@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Showtime::class])
    @slot('url', route('dashboard.showtimes.index'))
    @slot('name', trans('showtimes.plural'))
    @slot('active', request()->routeIs('*showtimes*'))
    @slot('icon', 'fas fa-clock')
    @slot('tree', [
        [
            'name' => trans('showtimes.actions.list'),
            'url' => route('dashboard.showtimes.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Showtime::class],
            'active' => request()->routeIs('*showtimes.index') || request()->routeIs('*showtimes.show')
        ],
        [
            'name' => trans('showtimes.actions.create'),
            'url' => route('dashboard.showtimes.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Showtime::class],
            'active' => request()->routeIs('*showtimes.create'),
        ],
    ])
@endcomponent
