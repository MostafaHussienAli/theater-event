<x-layout :title="trans('eventDayShowtimes.plural')" :breadcrumbs="['dashboard.event-day-showtimes.index']">
    @include('dashboard.eventDayShowtimes.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('eventDayShowtimes.actions.list'))
        @slot('tools')
            @include('dashboard.eventDayShowtimes.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('eventDayShowtimes.attributes.event_day_id')</th>
            <th>@lang('eventDayShowtimes.attributes.showtime_id')</th>
            <th>@lang('eventDayShowtimes.attributes.movie_id')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($eventDayShowtimes as $eventDayShowtime)
            <tr>
                <td>
                    <a href="{{ route('dashboard.event-day-showtimes.show', $eventDayShowtime) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $eventDayShowtime->eventDay?->date }}
                    </a>
                </td>
                <td>
                    {{ $eventDayShowtime->showtime?->start_time . ' - ' . $eventDayShowtime->showtime?->end_time }}
                </td>
                <td>
                    {{ $eventDayShowtime->movie?->name }}
                </td>
                <td style="width: 160px">
                    @include('dashboard.eventDayShowtimes.partials.actions.show')
                    @include('dashboard.eventDayShowtimes.partials.actions.edit')
                    @include('dashboard.eventDayShowtimes.partials.actions.status')
                    @include('dashboard.eventDayShowtimes.partials.actions.delete')
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
