<?php

Breadcrumbs::for('admin.reference.organization_status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Organization Status Management'), route('admin.reference.organization_status.index'));
});

Breadcrumbs::for('admin.reference.organization_status.create', function ($trail) {
    $trail->parent('admin.reference.organization_status.index');
    $trail->push(__('Create Organization Status'), route('admin.reference.organization_status.create'));
});

Breadcrumbs::for('admin.reference.organization_status.edit', function ($trail, $id) {
    $trail->parent('admin.reference.organization_status.index');
    $trail->push(__('Edit Organization Status'), route('admin.reference.organization_status.edit', $id));
});
