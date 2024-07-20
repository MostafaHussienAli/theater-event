@can('update', $movie)
    <a href="{{ route('dashboard.movies.edit', $movie) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
