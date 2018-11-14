<?php

Breadcrumbs::for('admin.opportunity.project.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.opportunity.projects.management'), route('admin.opportunity.project.index'));
});

Breadcrumbs::for('admin.opportunity.project.search', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.all'), route('admin.opportunity.project.search'));
});

Breadcrumbs::for('admin.opportunity.project.all', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.all'), route('admin.opportunity.project.all'));
});

Breadcrumbs::for('admin.opportunity.project.active', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.active'), route('admin.opportunity.project.active'));
});

Breadcrumbs::for('admin.opportunity.project.archived', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.archived'), route('admin.opportunity.project.archived'));
});

Breadcrumbs::for('admin.opportunity.project.completed', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.completed'), route('admin.opportunity.project.completed'));
});

Breadcrumbs::for('admin.opportunity.project.create', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('labels.backend.opportunity.projects.create'), route('admin.opportunity.project.create'));
});

Breadcrumbs::for('admin.opportunity.project.deleted', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.deleted'), route('admin.opportunity.project.deleted'));
});

Breadcrumbs::for('admin.opportunity.project.import_review', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.import_review'), route('admin.opportunity.project.import_review'));
});

Breadcrumbs::for('admin.opportunity.project.reviews', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.reviews'), route('admin.opportunity.project.reviews'));
});

Breadcrumbs::for('admin.opportunity.project.show', function ($trail, $id) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.view'), route('admin.opportunity.project.show', $id));
});

Breadcrumbs::for('admin.opportunity.project.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.edit'), route('admin.opportunity.project.edit', $id));
});
