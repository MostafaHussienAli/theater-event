<x-layout :title="trans('showtimes.trashed')" :breadcrumbs="['dashboard.showtimes.trashed']">
    @include('dashboard.showtimes.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('showtimes.actions.list') ({{ count_formatted($showtimes->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Showtime::class }}"
                        :resource="trans('showtimes.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Showtime::class }}"
                        :resource="trans('showtimes.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('showtimes.attributes.start_time')</th>
            <th class="d-none d-md-table-cell">@lang('showtimes.attributes.end_time')</th>
            <th>@lang('showtimes.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($showtimes as $showtime)
            <tr>
                <td>
                    <x-check-all-item :model="$showtime"></x-check-all-item>
                </td>
                <td>
                    {{ $showtime->start_time }}
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $showtime->end_time }}
                </td>
                <td>{{ $showtime->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.showtimes.partials.actions.show')
                    @include('dashboard.showtimes.partials.actions.restore')
                    @include('dashboard.showtimes.partials.actions.forceDelete')
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
