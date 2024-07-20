@can('viewTrash', \App\Models\Movie::class)
    <a href="{{ route('dashboard.movies.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('movies.trashed')
    </a>
@endcan
