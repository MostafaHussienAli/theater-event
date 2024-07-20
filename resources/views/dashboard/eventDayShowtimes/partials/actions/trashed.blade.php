@can('viewTrash', \App\Models\EventDayShowtime::class)
    <a href="{{ route('dashboard.event-day-showtimes.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('eventDayShowtimes.trashed')
    </a>
@endcan
