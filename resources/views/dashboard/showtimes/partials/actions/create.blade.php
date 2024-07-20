@can('create', \App\Models\Showtime::class)
    <a href="{{ route('dashboard.showtimes.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('showtimes.actions.create')
    </a>
@endcan
