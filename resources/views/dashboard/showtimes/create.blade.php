<x-layout :title="trans('showtimes.actions.create')" :breadcrumbs="['dashboard.showtimes.create']">
    {{ BsForm::resource('showtimes')->post(route('dashboard.showtimes.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('showtimes.actions.create'))

        @include('dashboard.showtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('showtimes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
