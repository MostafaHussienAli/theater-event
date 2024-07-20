<?php

Breadcrumbs::for('dashboard.event-day-showtimes.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('eventDayShowtimes.plural'), route('dashboard.event-day-showtimes.index'));
});

Breadcrumbs::for('dashboard.event-day-showtimes.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.event-day-showtimes.index');
    $breadcrumb->push(trans('eventDayShowtimes.trashed'), route('dashboard.event-day-showtimes.trashed'));
});

Breadcrumbs::for('dashboard.event-day-showtimes.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.event-day-showtimes.index');
    $breadcrumb->push(trans('eventDayShowtimes.actions.create'), route('dashboard.event-day-showtimes.create'));
});

Breadcrumbs::for('dashboard.event-day-showtimes.show', function ($breadcrumb, $eventDayShowtime) {
    $breadcrumb->parent('dashboard.event-day-showtimes.index');
    $breadcrumb->push(isset($eventDayShowtime->event_day) ? $eventDayShowtime->event_day->date : $eventDayShowtime->id, route('dashboard.event-day-showtimes.show', $eventDayShowtime));
});

Breadcrumbs::for('dashboard.event-day-showtimes.edit', function ($breadcrumb, $eventDayShowtime) {
    $breadcrumb->parent('dashboard.event-day-showtimes.show', $eventDayShowtime);
    $breadcrumb->push(trans('eventDayShowtimes.actions.edit'), route('dashboard.event-day-showtimes.edit', $eventDayShowtime));
});
