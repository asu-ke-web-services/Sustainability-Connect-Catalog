<?php

Breadcrumbs::for('admin.reference.organization_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Organization Type Management'), route('admin.reference.organization_type.index'));
});

Breadcrumbs::for('admin.reference.organization_type.create', function ($trail) {
    $trail->parent('admin.reference.organization_type.index');
    $trail->push(__('Create Organization Type'), route('admin.reference.organization_type.create'));
});

Breadcrumbs::for('admin.reference.organization_type.edit', function ($trail, $id) {
    $trail->parent('admin.reference.organization_type.index');
    $trail->push(__('Edit Organization Type'), route('admin.reference.organization_type.edit', $id));
});
