@can('update', $attendee)
    <a href="{{ route('dashboard.attendees.edit', $attendee) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
