@can('update', $eventDay)
    <a href="{{ route('dashboard.event-days.status', $eventDay) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($eventDay->is_active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
