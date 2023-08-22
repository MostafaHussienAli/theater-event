<?php

Breadcrumbs::for('dashboard.cities.areas.edit', function ($breadcrumb, $city, $area) {
    $breadcrumb->parent('dashboard.countries.show', $city->country);
    $breadcrumb->push(
        trans('areas.actions.edit'),
        route('dashboard.cities.areas.edit', [$city, $area])
    );
});
