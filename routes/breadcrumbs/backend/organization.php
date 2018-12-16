<?php

Breadcrumbs::for('admin.organization.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.organization.management'), route('admin.organization.index'));
});

Breadcrumbs::for('admin.organization.active', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organization.active'), route('admin.organization.active'));
});

Breadcrumbs::for('admin.organization.inactive', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organization.inactive'), route('admin.organization.inactive'));
});

Breadcrumbs::for('admin.organization.deleted', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organization.deleted'), route('admin.organization.deleted'));
});

Breadcrumbs::for('admin.organization.create', function ($trail) {
    $trail->parent('admin.organization.index');
    $trail->push(__('labels.backend.organization.create'), route('admin.organization.create'));
});

Breadcrumbs::for('admin.organization.show', function ($trail, $id) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organization.view'), route('admin.organization.show', $id));
});

Breadcrumbs::for('admin.organization.edit', function ($trail, $id) {
    $trail->parent('admin.organization.index');
    $trail->push(__('menus.backend.organization.edit'), route('admin.organization.edit', $id));
});
