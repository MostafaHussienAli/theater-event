@can('update', $movie)
    <a href="{{ route('dashboard.movies.status', $movie) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($movie->is_active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
