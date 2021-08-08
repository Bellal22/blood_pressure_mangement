<?php

Breadcrumbs::for('dashboard.doctors.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('doctors.plural'), route('dashboard.doctors.index'));
});

Breadcrumbs::for('dashboard.doctors.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.doctors.index');
    $breadcrumb->push(trans('doctors.trashed'), route('dashboard.doctors.trashed'));
});

Breadcrumbs::for('dashboard.doctors.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.doctors.index');
    $breadcrumb->push(trans('doctors.actions.create'), route('dashboard.doctors.create'));
});

Breadcrumbs::for('dashboard.doctors.show', function ($breadcrumb, $doctor) {
    $breadcrumb->parent('dashboard.doctors.index');
    $breadcrumb->push($doctor->name, route('dashboard.doctors.show', $doctor));
});

Breadcrumbs::for('dashboard.doctors.edit', function ($breadcrumb, $doctor) {
    $breadcrumb->parent('dashboard.doctors.show', $doctor);
    $breadcrumb->push(trans('doctors.actions.edit'), route('dashboard.doctors.edit', $doctor));
});
