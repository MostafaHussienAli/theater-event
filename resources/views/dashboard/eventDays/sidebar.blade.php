@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\EventDay::class])
    @slot('url', route('dashboard.event-days.index'))
    @slot('name', trans('eventDays.plural'))
    @slot('active', request()->routeIs('*event-days*'))
    @slot('icon', 'fas fa-calendar')
    @slot('tree', [
        [
            'name' => trans('eventDays.actions.list'),
            'url' => route('dashboard.event-days.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\EventDay::class],
            'active' => request()->routeIs('*event-days.index') || request()->routeIs('*event-days.show')
        ],
        [
            'name' => trans('eventDays.actions.create'),
            'url' => route('dashboard.event-days.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\EventDay::class],
            'active' => request()->routeIs('*event-days.create'),
        ],
    ])
@endcomponent
