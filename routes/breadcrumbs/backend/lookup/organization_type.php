<?php

Breadcrumbs::for('admin.lookup.organization_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Organization Type Management'), route('admin.lookup.organization_type.index'));
});

Breadcrumbs::for('admin.lookup.organization_type.create', function ($trail) {
    $trail->parent('admin.lookup.organization_type.index');
    $trail->push(__('Create Organization Type'), route('admin.lookup.organization_type.create'));
});

Breadcrumbs::for('admin.lookup.organization_type.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.organization_type.index');
    $trail->push(__('Edit Organization Type'), route('admin.lookup.organization_type.edit', $id));
});
