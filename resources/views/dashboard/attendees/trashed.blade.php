<x-layout :title="trans('attendees.trashed')" :breadcrumbs="['dashboard.attendees.trashed']">
    @include('dashboard.attendees.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('attendees.actions.list') ({{ count_formatted($attendees->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Attendee::class }}"
                        :resource="trans('attendees.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Attendee::class }}"
                        :resource="trans('attendees.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('attendees.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.mobile')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.email')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.event_day_id')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.showtime_id')</th>
            <th class="d-none d-md-table-cell">@lang('attendees.attributes.movie_id')</th>
            <th>@lang('attendees.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($attendees as $attendee)
            <tr>
                <td>
                    <x-check-all-item :model="$attendee"></x-check-all-item>
                </td>
                <td>
                    {{ $attendee->name }}
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
                <td>{{ $attendee->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.attendees.partials.actions.show')
                    @include('dashboard.attendees.partials.actions.restore')
                    @include('dashboard.attendees.partials.actions.forceDelete')
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
