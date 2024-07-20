<x-layout :title="$attendee->name" :breadcrumbs="['dashboard.attendees.edit', $attendee]">
    {{ BsForm::resource('attendees')->putModel($attendee, route('dashboard.attendees.update', $attendee), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('attendees.actions.edit'))

        @include('dashboard.attendees.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('attendees.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
