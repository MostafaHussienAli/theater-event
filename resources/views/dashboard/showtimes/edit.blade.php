<x-layout :title="$showtime->name" :breadcrumbs="['dashboard.showtimes.edit', $showtime]">
    {{ BsForm::resource('showtimes')->putModel($showtime, route('dashboard.showtimes.update', $showtime), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('showtimes.actions.edit'))

        @include('dashboard.showtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('showtimes.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
