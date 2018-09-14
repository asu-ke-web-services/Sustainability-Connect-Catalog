<?php

Breadcrumbs::for('admin.organization.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.organizations.management'), route('admin.organization.index'));
});

Breadcrumbs::for('admin.organization.deleted', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organizations.deleted'), route('admin.organization.deleted'));
});

Breadcrumbs::for('admin.organization.create', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('labels.backend.organizations.create'), route('admin.organization.create'));
});

Breadcrumbs::for('admin.organization.show', function ($trail, $id) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organizations.view'), route('admin.organization.show', $id));
});

Breadcrumbs::for('admin.organization.edit', function ($trail, $id) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organizations.edit'), route('admin.organization.edit', $id));
});
