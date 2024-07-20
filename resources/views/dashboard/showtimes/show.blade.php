<x-layout :title="$showtime->name" :breadcrumbs="['dashboard.showtimes.show', $showtime]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('showtimes.attributes.start_time')</th>
                <td>{{ $showtime->start_time }}</td>
            </tr>
            <tr>
                <th width="200">@lang('showtimes.attributes.end_time')</th>
                <td>{{ $showtime->end_time }}</td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.showtimes.partials.actions.edit')
            @include('dashboard.showtimes.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>
