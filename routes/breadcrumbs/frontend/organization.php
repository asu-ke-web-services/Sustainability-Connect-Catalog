<?php

Breadcrumbs::for('frontend.organization.index', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('labels.backend.organization.management'), route('frontend.organization.index'));
});

Breadcrumbs::for('frontend.organization.active', function ($trail) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('menus.backend.organization.active'), route('frontend.organization.active'));
});

Breadcrumbs::for('frontend.organization.inactive', function ($trail) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('menus.backend.organization.inactive'), route('frontend.organization.inactive'));
});

Breadcrumbs::for('frontend.organization.deleted', function ($trail) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('menus.backend.organization.deleted'), route('frontend.organization.deleted'));
});

Breadcrumbs::for('frontend.organization.create', function ($trail) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('labels.backend.organization.create'), route('frontend.organization.create'));
});

Breadcrumbs::for('frontend.organization.show', function ($trail, $id) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('menus.backend.organization.view'), route('frontend.organization.show', $id));
});

Breadcrumbs::for('frontend.organization.edit', function ($trail, $id) {
    $trail->parent('frontend.organization.index');
    $trail->push(__('menus.backend.organization.edit'), route('frontend.organization.edit', $id));
});
