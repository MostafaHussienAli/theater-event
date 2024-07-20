<x-layout :title="trans('attendees.actions.create')" :breadcrumbs="['dashboard.attendees.create']">
    {{ BsForm::resource('attendees')->post(route('dashboard.attendees.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('attendees.actions.create'))

        @include('dashboard.attendees.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('attendees.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
