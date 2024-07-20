@can('create', \App\Models\Attendee::class)
    <a href="{{ route('dashboard.attendees.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('attendees.actions.create')
    </a>
@endcan
