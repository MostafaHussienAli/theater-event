@can('update', $eventDayShowtime)
    <a href="{{ route('dashboard.event-day-showtimes.status', $eventDayShowtime) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($eventDayShowtime->is_active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
