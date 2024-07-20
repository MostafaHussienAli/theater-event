<x-layout :title="$movie->name" :breadcrumbs="['dashboard.movies.edit', $movie]">
    {{ BsForm::resource('movies')->putModel($movie, route('dashboard.movies.update', $movie), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('movies.actions.edit'))

        @include('dashboard.movies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('movies.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
