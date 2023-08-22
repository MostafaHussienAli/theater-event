@can('view', $area)
    <a href="{{ route('dashboard.areas.show', $area) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
