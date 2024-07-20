@can('view', $eventDayShowtime)
    <a href="{{ route('dashboard.event-day-showtimes.show', $eventDayShowtime) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
