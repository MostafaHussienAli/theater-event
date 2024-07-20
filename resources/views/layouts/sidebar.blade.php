@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.eventDays.sidebar')
@include('dashboard.showtimes.sidebar')
@include('dashboard.movies.sidebar')
@include('dashboard.eventDayShowtimes.sidebar')
@include('dashboard.attendees.sidebar')
