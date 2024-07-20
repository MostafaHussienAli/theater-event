@can('update', $showtime)
    <a href="{{ route('dashboard.showtimes.status', $showtime) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($showtime->is_active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
