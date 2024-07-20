<?php

Breadcrumbs::for('dashboard.attendees.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('attendees.plural'), route('dashboard.attendees.index'));
});

Breadcrumbs::for('dashboard.attendees.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.attendees.index');
    $breadcrumb->push(trans('attendees.trashed'), route('dashboard.attendees.trashed'));
});

Breadcrumbs::for('dashboard.attendees.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.attendees.index');
    $breadcrumb->push(trans('attendees.actions.create'), route('dashboard.attendees.create'));
});

Breadcrumbs::for('dashboard.attendees.show', function ($breadcrumb, $attendee) {
    $breadcrumb->parent('dashboard.attendees.index');
    $breadcrumb->push($attendee->name, route('dashboard.attendees.show', $attendee));
});

Breadcrumbs::for('dashboard.attendees.edit', function ($breadcrumb, $attendee) {
    $breadcrumb->parent('dashboard.attendees.show', $attendee);
    $breadcrumb->push(trans('attendees.actions.edit'), route('dashboard.attendees.edit', $attendee));
});
