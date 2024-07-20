<x-layout :title="trans('eventDayShowtimes.trashed')" :breadcrumbs="['dashboard.event-day-showtimes.trashed']">
    @include('dashboard.eventDayShowtimes.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('eventDayShowtimes.actions.list') ({{ count_formatted($eventDayShowtimes->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\EventDayShowtime::class }}"
                        :resource="trans('eventDayShowtimes.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\EventDayShowtime::class }}"
                        :resource="trans('eventDayShowtimes.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('eventDayShowtimes.attributes.event_day_id')</th>
            <th>@lang('eventDayShowtimes.attributes.showtime_id')</th>
            <th>@lang('eventDayShowtimes.attributes.movie_id')</th>
            <th>@lang('eventDayShowtimes.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($eventDayShowtimes as $eventDayShowtime)
            <tr>
                <td>
                    <x-check-all-item :model="$eventDayShowtime"></x-check-all-item>
                </td>
                <td>
                    {{ $eventDayShowtime->eventDay?->date }}
                </td>
                <td>
                    {{ $eventDayShowtime->showtime?->start_time . ' - ' . $eventDayShowtime->showtime?->end_time }}
                </td>
                <td>
                    {{ $eventDayShowtime->movie?->name }}
                </td>
                <td>{{ $eventDayShowtime->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.eventDayShowtimes.partials.actions.show')
                    @include('dashboard.eventDayShowtimes.partials.actions.restore')
                    @include('dashboard.eventDayShowtimes.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('eventDayShowtimes.empty')</td>
            </tr>
        @endforelse

        @if($eventDayShowtimes->hasPages())
            @slot('footer')
                {{ $eventDayShowtimes->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
