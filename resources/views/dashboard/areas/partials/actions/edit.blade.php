@can('update', [$area, $city])
    <a href="{{ route('dashboard.cities.areas.edit', [$city, $area]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-edit"></i>
    </a>
@endcan
