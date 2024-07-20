<?php

Breadcrumbs::for('dashboard.event-days.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('eventDays.plural'), route('dashboard.event-days.index'));
});

Breadcrumbs::for('dashboard.event-days.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.event-days.index');
    $breadcrumb->push(trans('eventDays.trashed'), route('dashboard.event-days.trashed'));
});

Breadcrumbs::for('dashboard.event-days.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.event-days.index');
    $breadcrumb->push(trans('eventDays.actions.create'), route('dashboard.event-days.create'));
});

Breadcrumbs::for('dashboard.event-days.show', function ($breadcrumb, $eventDay) {
    $breadcrumb->parent('dashboard.event-days.index');
    $breadcrumb->push($eventDay->date, route('dashboard.event-days.show', $eventDay));
});

Breadcrumbs::for('dashboard.event-days.edit', function ($breadcrumb, $eventDay) {
    $breadcrumb->parent('dashboard.event-days.show', $eventDay);
    $breadcrumb->push(trans('eventDays.actions.edit'), route('dashboard.event-days.edit', $eventDay));
});
