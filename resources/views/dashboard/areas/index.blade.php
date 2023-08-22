@include('dashboard.areas.partials.filter')

@component('dashboard::components.table-box')
    @slot('title', trans('areas.actions.list'))
    @slot('bodyClass', 'p-0')
    <thead>
    <tr>
        <th>@lang('areas.attributes.name')</th>

        <th style="width: 160px">...</th>
    </tr>
    </thead>
    <tbody>
    @forelse($areas as $area)
        <tr>
            <td>{{ $area->name }}</td>

            <td style="width: 160px">
                @include('dashboard.areas.partials.actions.edit')
                @include('dashboard.areas.partials.actions.delete')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('areas.empty')</td>
        </tr>
    @endforelse

    @if($areas->hasPages())
        @slot('footer')
            {{ $areas->links() }}
        @endslot
    @endif
@endcomponent
