@can('view', [$country, $city])
    <a href="{{ route('dashboard.countries.cities.show', [$country, $city]) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
