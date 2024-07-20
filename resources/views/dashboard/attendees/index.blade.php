<x-layout :title="trans('attendees.plural')" :breadcrumbs="['dashboard.attendees.index']">
    @include('dashboard.attendees.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('attendees.actions.list'))
        @slot('tools')
            @include('dashboard.attendees.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('attendees.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.mobile')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.email')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.event_day_id')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.showtime_id')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.movie_id')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($attendees as $attendee)
            <tr>
                <td>
                    <a href="{{ route('dashboard.attendees.show', $attendee) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $attendee->name }}
                    </a>
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $attendee->mobile }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $attendee->email }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $attendee->eventDay?->date }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $attendee->showtime?->start_time . ' - ' . $attendee->showtime?->end_time }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $attendee->movie?->name }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.attendees.partials.actions.show')
                    @include('dashboard.attendees.partials.actions.edit')
                    @include('dashboard.attendees.partials.actions.status')
                    @include('dashboard.attendees.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('attendees.empty')</td>
            </tr>
        @endforelse

        @if($attendees->hasPages())
            @slot('footer')
                {{ $attendees->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
