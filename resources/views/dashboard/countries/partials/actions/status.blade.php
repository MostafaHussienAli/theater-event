@can('update', $country)
    <a href="{{ route('dashboard.countries.status', $country) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($country->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
