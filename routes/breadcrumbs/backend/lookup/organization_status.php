<?php

Breadcrumbs::for('admin.lookup.organization_status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Organization Status Management'), route('admin.lookup.organization_status.index'));
});

Breadcrumbs::for('admin.lookup.organization_status.create', function ($trail) {
    $trail->parent('admin.lookup.organization_status.index');
    $trail->push(__('Create Organization Status'), route('admin.lookup.organization_status.create'));
});

Breadcrumbs::for('admin.lookup.organization_status.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.organization_status.index');
    $trail->push(__('Edit Organization Status'), route('admin.lookup.organization_status.edit', $id));
});
