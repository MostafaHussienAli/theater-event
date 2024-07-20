@can('viewTrash', \App\Models\Showtime::class)
    <a href="{{ route('dashboard.showtimes.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('showtimes.trashed')
    </a>
@endcan
