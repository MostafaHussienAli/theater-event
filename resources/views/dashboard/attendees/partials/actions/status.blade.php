@can('update', $attendee)
    <a href="{{ route('dashboard.attendees.status', $attendee) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($attendee->is_active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
