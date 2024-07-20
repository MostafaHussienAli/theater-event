<x-layout :title="trans('eventDayShowtimes.actions.create')" :breadcrumbs="['dashboard.event-day-showtimes.create']">
    {{ BsForm::resource('eventDayShowtimes')->post(route('dashboard.event-day-showtimes.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('eventDayShowtimes.actions.create'))

        @include('dashboard.eventDayShowtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventDayShowtimes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
