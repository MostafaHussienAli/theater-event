<x-layout :title="trans('eventDays.plural')" :breadcrumbs="['dashboard.event-days.index']">
    @include('dashboard.eventDays.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('eventDays.actions.list'))
        @slot('tools')
            @include('dashboard.eventDays.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('eventDays.attributes.date')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($eventDays as $eventDay)
            <tr>
                <td>
                    <a href="{{ route('dashboard.event-days.show', $eventDay) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $eventDay->date }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.eventDays.partials.actions.show')
                    @include('dashboard.eventDays.partials.actions.edit')
                    @include('dashboard.eventDays.partials.actions.status')
                    @include('dashboard.eventDays.partials.actions.delete')
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
