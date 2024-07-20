<x-layout :title="trans('eventDays.trashed')" :breadcrumbs="['dashboard.event-days.trashed']">
    @include('dashboard.eventDays.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('eventDays.actions.list') ({{ count_formatted($eventDays->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\EventDay::class }}"
                        :resource="trans('eventDays.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\EventDay::class }}"
                        :resource="trans('eventDays.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('eventDays.attributes.date')</th>
            <th>@lang('eventDays.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($eventDays as $eventDay)
            <tr>
                <td>
                    <x-check-all-item :model="$eventDay"></x-check-all-item>
                </td>
                <td>
                    {{ $eventDay->date }}
                </td>
                <td>{{ $eventDay->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.eventDays.partials.actions.show')
                    @include('dashboard.eventDays.partials.actions.restore')
                    @include('dashboard.eventDays.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('eventDays.empty')</td>
            </tr>
        @endforelse

        @if($eventDays->hasPages())
            @slot('footer')
                {{ $eventDays->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
