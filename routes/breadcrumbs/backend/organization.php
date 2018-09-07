<?php

Breadcrumbs::for('admin.organization.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.organizations.management'), route('admin.organization.index'));
});

Breadcrumbs::for('admin.organization.create', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organizations.create'), route('admin.organization.create'));
});

Breadcrumbs::for('admin.organization.edit', function ($trail, $id) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organizations.edit'), route('admin.organization.edit', $id));
});
