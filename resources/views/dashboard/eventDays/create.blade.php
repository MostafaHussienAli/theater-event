<x-layout :title="trans('eventDays.actions.create')" :breadcrumbs="['dashboard.event-days.create']">
    {{ BsForm::resource('eventDays')->post(route('dashboard.event-days.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('eventDays.actions.create'))

        @include('dashboard.eventDays.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventDays.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
