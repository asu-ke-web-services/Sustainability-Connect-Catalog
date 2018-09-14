<?php

Breadcrumbs::for('admin.opportunity.project.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.opportunity.projects.management'), route('admin.opportunity.project.index'));
});

Breadcrumbs::for('admin.opportunity.project.deactivated', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.deactivated'), route('admin.opportunity.project.deactivated'));
});

Breadcrumbs::for('admin.opportunity.project.deleted', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.deleted'), route('admin.opportunity.project.deleted'));
});

Breadcrumbs::for('admin.opportunity.project.create', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('labels.backend.opportunity.projects.create'), route('admin.opportunity.project.create'));
});

Breadcrumbs::for('admin.opportunity.project.show', function ($trail, $id) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.view'), route('admin.opportunity.project.show', $id));
});

Breadcrumbs::for('admin.opportunity.project.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.edit'), route('admin.opportunity.project.edit', $id));
});
