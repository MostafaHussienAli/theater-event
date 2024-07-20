<x-layout :title="$eventDayShowtime->id" :breadcrumbs="['dashboard.event-day-showtimes.show', $eventDayShowtime]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('eventDayShowtimes.attributes.event_day_id')</th>
                <td>{{ $eventDayShowtime->eventDay?->date }}</td>
            </tr>
            <tr>
                <th width="200">@lang('eventDayShowtimes.attributes.showtime_id')</th>
                <td>{{ $eventDayShowtime->showtime?->start_time . ' - ' . $eventDayShowtime->showtime?->end_time }}</td>
            </tr>
            <tr>
                <th width="200">@lang('eventDayShowtimes.attributes.movie_id')</th>
                <td>{{ $eventDayShowtime->movie?->name }}</td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.eventDayShowtimes.partials.actions.edit')
            @include('dashboard.eventDayShowtimes.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>
