@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Attendee::class])
    @slot('url', route('dashboard.attendees.index'))
    @slot('name', trans('attendees.plural'))
    @slot('active', request()->routeIs('*attendees*'))
    @slot('icon', 'fas fa-users')
    @slot('tree', [
        [
            'name' => trans('attendees.actions.list'),
            'url' => route('dashboard.attendees.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Attendee::class],
            'active' => request()->routeIs('*attendees.index') || request()->routeIs('*attendees.show')
        ],
        [
            'name' => trans('attendees.actions.create'),
            'url' => route('dashboard.attendees.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Attendee::class],
            'active' => request()->routeIs('*attendees.create'),
        ],
    ])
@endcomponent
