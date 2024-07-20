@can('viewTrash', \App\Models\Attendee::class)
    <a href="{{ route('dashboard.attendees.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('attendees.trashed')
    </a>
@endcan
