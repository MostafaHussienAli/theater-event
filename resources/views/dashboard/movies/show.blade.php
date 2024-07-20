<x-layout :title="$movie->name" :breadcrumbs="['dashboard.movies.show', $movie]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('movies.attributes.name')</th>
                <td>{{ $movie->name }}</td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.movies.partials.actions.edit')
            @include('dashboard.movies.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>
