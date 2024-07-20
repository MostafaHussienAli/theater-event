<x-layout :title="trans('movies.trashed')" :breadcrumbs="['dashboard.movies.trashed']">
    @include('dashboard.movies.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('movies.actions.list') ({{ count_formatted($movies->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Movie::class }}"
                        :resource="trans('movies.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Movie::class }}"
                        :resource="trans('movies.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('movies.attributes.name')</th>
            <th>@lang('movies.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($movies as $movie)
            <tr>
                <td>
                    <x-check-all-item :model="$movie"></x-check-all-item>
                </td>
                <td>
                    {{ $movie->name }}
                </td>
                <td>{{ $movie->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.movies.partials.actions.show')
                    @include('dashboard.movies.partials.actions.restore')
                    @include('dashboard.movies.partials.actions.forceDelete')
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
