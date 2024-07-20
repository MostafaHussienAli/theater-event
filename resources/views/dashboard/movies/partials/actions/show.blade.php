@can('view', $movie)
    <a href="{{ route('dashboard.movies.show', $movie) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
