<x-layout :title="$attendee->name" :breadcrumbs="['dashboard.attendees.show', $attendee]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('attendees.attributes.name')</th>
                <td>{{ $attendee->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('attendees.attributes.mobile')</th>
                <td>{{ $attendee->mobile }}</td>
            </tr>
            <tr>
                <th width="200">@lang('attendees.attributes.email')</th>
                <td>{{ $attendee->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('attendees.attributes.event_day_id')</th>
                <td>{{ $attendee->eventDay?->date }}</td>
            </tr>
            <tr>
                <th width="200">@lang('attendees.attributes.showtime_id')</th>
                <td>{{ $attendee->showtime?->start_time . ' - ' . $attendee->showtime?->end_time }}</td>
            </tr>
            <tr>
                <th width="200">@lang('attendees.attributes.movie_id')</th>
                <td>{{ $attendee->movie?->name }}</td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.attendees.partials.actions.edit')
            @include('dashboard.attendees.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>
