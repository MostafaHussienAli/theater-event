<x-layout :title="$eventDay->name" :breadcrumbs="['dashboard.event-days.edit', $eventDay]">
    {{ BsForm::resource('eventDays')->putModel($eventDay, route('dashboard.event-days.update', $eventDay), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('eventDays.actions.edit'))

        @include('dashboard.eventDays.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventDays.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
