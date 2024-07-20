@can('create', \App\Models\EventDay::class)
    <a href="{{ route('dashboard.event-days.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('eventDays.actions.create')
    </a>
@endcan
