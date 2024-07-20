<?php

Breadcrumbs::for('dashboard.movies.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('movies.plural'), route('dashboard.movies.index'));
});

Breadcrumbs::for('dashboard.movies.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.movies.index');
    $breadcrumb->push(trans('movies.trashed'), route('dashboard.movies.trashed'));
});

Breadcrumbs::for('dashboard.movies.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.movies.index');
    $breadcrumb->push(trans('movies.actions.create'), route('dashboard.movies.create'));
});

Breadcrumbs::for('dashboard.movies.show', function ($breadcrumb, $movie) {
    $breadcrumb->parent('dashboard.movies.index');
    $breadcrumb->push($movie->name, route('dashboard.movies.show', $movie));
});

Breadcrumbs::for('dashboard.movies.edit', function ($breadcrumb, $movie) {
    $breadcrumb->parent('dashboard.movies.show', $movie);
    $breadcrumb->push(trans('movies.actions.edit'), route('dashboard.movies.edit', $movie));
});
