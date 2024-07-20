<x-layout :title="$eventDay->name" :breadcrumbs="['dashboard.event-days.show', $eventDay]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('eventDays.attributes.date')</th>
                <td>{{ $eventDay->date }}</td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.eventDays.partials.actions.edit')
            @include('dashboard.eventDays.partials.actions.delete')
        @endslot
    @endcomponent
</x-layout>
