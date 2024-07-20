<x-layout :title="trans('movies.actions.create')" :breadcrumbs="['dashboard.movies.create']">
    {{ BsForm::resource('movies')->post(route('dashboard.movies.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('movies.actions.create'))

        @include('dashboard.movies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('movies.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
