@can('create', \App\Models\EventDayShowtime::class)
    <a href="{{ route('dashboard.event-day-showtimes.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('eventDayShowtimes.actions.create')
    </a>
@endcan
