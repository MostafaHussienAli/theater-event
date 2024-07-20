@can('view', $attendee)
    <a href="{{ route('dashboard.attendees.show', $attendee) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
