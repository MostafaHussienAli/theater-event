<x-layout :title="trans('movies.plural')" :breadcrumbs="['dashboard.movies.index']">
    @include('dashboard.movies.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('movies.actions.list'))
        @slot('tools')
            @include('dashboard.movies.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('movies.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($movies as $movie)
            <tr>
                <td>
                    <a href="{{ route('dashboard.movies.show', $movie) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $movie->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.movies.partials.actions.show')
                    @include('dashboard.movies.partials.actions.edit')
                    @include('dashboard.movies.partials.actions.status')
                    @include('dashboard.movies.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('movies.empty')</td>
            </tr>
        @endforelse

        @if($movies->hasPages())
            @slot('footer')
                {{ $movies->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
