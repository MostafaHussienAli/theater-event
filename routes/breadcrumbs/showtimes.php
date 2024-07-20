<?php

Breadcrumbs::for('dashboard.showtimes.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('showtimes.plural'), route('dashboard.showtimes.index'));
});

Breadcrumbs::for('dashboard.showtimes.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.showtimes.index');
    $breadcrumb->push(trans('showtimes.trashed'), route('dashboard.showtimes.trashed'));
});

Breadcrumbs::for('dashboard.showtimes.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.showtimes.index');
    $breadcrumb->push(trans('showtimes.actions.create'), route('dashboard.showtimes.create'));
});

Breadcrumbs::for('dashboard.showtimes.show', function ($breadcrumb, $showtime) {
    $breadcrumb->parent('dashboard.showtimes.index');
    $breadcrumb->push($showtime->start_time . ' - ' . $showtime->end_time, route('dashboard.showtimes.show', $showtime));
});

Breadcrumbs::for('dashboard.showtimes.edit', function ($breadcrumb, $showtime) {
    $breadcrumb->parent('dashboard.showtimes.show', $showtime);
    $breadcrumb->push(trans('showtimes.actions.edit'), route('dashboard.showtimes.edit', $showtime));
});
