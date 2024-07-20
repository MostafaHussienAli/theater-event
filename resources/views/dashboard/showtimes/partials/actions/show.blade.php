@can('view', $showtime)
    <a href="{{ route('dashboard.showtimes.show', $showtime) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
