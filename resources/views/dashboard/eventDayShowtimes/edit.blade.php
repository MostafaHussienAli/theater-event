<x-layout :title="$eventDayShowtime->name" :breadcrumbs="['dashboard.event-day-showtimes.edit', $eventDayShowtime]">
    {{ BsForm::resource('eventDayShowtimes')->putModel($eventDayShowtime, route('dashboard.event-day-showtimes.update', $eventDayShowtime), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('eventDayShowtimes.actions.edit'))

        @include('dashboard.eventDayShowtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventDayShowtimes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
