@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'manage', 'model' => \App\Models\Setting::class])
    @slot('url', '#')
    @slot('name', trans('settings.plural'))
    @slot('active', request()->routeIs('*settings*'))
    @slot('icon', 'fas fa-cogs')
    @slot('tree', [
        [
            'name' => trans('settings.tabs.main'),
            'url' => route('dashboard.settings.index', ['tab' => 'main']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'main',
        ],
        [
            'name' => trans('settings.tabs.contacts'),
            'url' => route('dashboard.settings.index', ['tab' => 'contacts']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'contacts',
        ],
        [
            'name' => trans('settings.tabs.mail'),
            'url' => route('dashboard.settings.index', ['tab' => 'mail']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'mail',
        ],
        [
            'name' => trans('settings.tabs.pusher'),
            'url' => route('dashboard.settings.index', ['tab' => 'pusher']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'pusher',
        ],
        [
            'name' => trans('backup.download'),
            'url' => route('dashboard.backup.download'),
        ],
    ])
@endcomponent


