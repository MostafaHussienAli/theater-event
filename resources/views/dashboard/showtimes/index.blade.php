<x-layout :title="trans('showtimes.plural')" :breadcrumbs="['dashboard.showtimes.index']">
    @include('dashboard.showtimes.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('showtimes.actions.list'))
        @slot('tools')
            @include('dashboard.showtimes.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('showtimes.attributes.start_time')</th>
            <th class="d-none d-md-table-cell">@lang('showtimes.attributes.end_time')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($showtimes as $showtime)
            <tr>
                <td>
                    {{ $showtime->start_time }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $showtime->end_time }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.showtimes.partials.actions.show')
                    @include('dashboard.showtimes.partials.actions.edit')
                    @include('dashboard.showtimes.partials.actions.status')
                    @include('dashboard.showtimes.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('showtimes.empty')</td>
            </tr>
        @endforelse

        @if($showtimes->hasPages())
            @slot('footer')
                {{ $showtimes->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
