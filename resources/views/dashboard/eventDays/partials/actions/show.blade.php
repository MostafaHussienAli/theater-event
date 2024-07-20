@can('view', $eventDay)
    <a href="{{ route('dashboard.event-days.show', $eventDay) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
