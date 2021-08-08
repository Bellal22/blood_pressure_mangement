<?php

Breadcrumbs::for('dashboard.nurses.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('nurses.plural'), route('dashboard.nurses.index'));
});

Breadcrumbs::for('dashboard.nurses.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.nurses.index');
    $breadcrumb->push(trans('nurses.trashed'), route('dashboard.nurses.trashed'));
});

Breadcrumbs::for('dashboard.nurses.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.nurses.index');
    $breadcrumb->push(trans('nurses.actions.create'), route('dashboard.nurses.create'));
});

Breadcrumbs::for('dashboard.nurses.show', function ($breadcrumb, $nurse) {
    $breadcrumb->parent('dashboard.nurses.index');
    $breadcrumb->push($nurse->name, route('dashboard.nurses.show', $nurse));
});

Breadcrumbs::for('dashboard.nurses.edit', function ($breadcrumb, $nurse) {
    $breadcrumb->parent('dashboard.nurses.show', $nurse);
    $breadcrumb->push(trans('nurses.actions.edit'), route('dashboard.nurses.edit', $nurse));
});
