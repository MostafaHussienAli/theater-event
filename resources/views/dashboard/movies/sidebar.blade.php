@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Movie::class])
    @slot('url', route('dashboard.movies.index'))
    @slot('name', trans('movies.plural'))
    @slot('active', request()->routeIs('*movies*'))
    @slot('icon', 'fas fa-film')
    @slot('tree', [
        [
            'name' => trans('movies.actions.list'),
            'url' => route('dashboard.movies.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Movie::class],
            'active' => request()->routeIs('*movies.index') || request()->routeIs('*movies.show')
        ],
        [
            'name' => trans('movies.actions.create'),
            'url' => route('dashboard.movies.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Movie::class],
            'active' => request()->routeIs('*movies.create'),
        ],
    ])
@endcomponent
