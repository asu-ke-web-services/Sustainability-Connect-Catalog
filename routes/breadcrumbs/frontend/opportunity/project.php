<?php

Breadcrumbs::for('frontend.opportunity.project.index', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('labels.backend.opportunity.projects.management'), route('frontend.opportunity.project.index'));
});

Breadcrumbs::for('frontend.opportunity.project.search', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.all'), route('frontend.opportunity.project.search'));
});

Breadcrumbs::for('frontend.opportunity.project.all', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.all'), route('frontend.opportunity.project.all'));
});

Breadcrumbs::for('frontend.opportunity.project.active', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.active'), route('frontend.opportunity.project.active'));
});

Breadcrumbs::for('frontend.opportunity.project.expired', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.expired'), route('frontend.opportunity.project.expired'));
});

Breadcrumbs::for('frontend.opportunity.project.invalid_open', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.invalid_open'), route('frontend.opportunity.project.invalid_open'));
});

Breadcrumbs::for('frontend.opportunity.project.future', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.future'), route('frontend.opportunity.project.future'));
});

Breadcrumbs::for('frontend.opportunity.project.archived', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.archived'), route('frontend.opportunity.project.archived'));
});

Breadcrumbs::for('frontend.opportunity.project.completed', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.completed'), route('frontend.opportunity.project.completed'));
});

Breadcrumbs::for('frontend.opportunity.project.create', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('labels.backend.opportunity.projects.create'), route('frontend.opportunity.project.create'));
});

Breadcrumbs::for('frontend.opportunity.project.deleted', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.deleted'), route('frontend.opportunity.project.deleted'));
});

Breadcrumbs::for('frontend.opportunity.project.import_review', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.import_review'), route('frontend.opportunity.project.import_review'));
});

Breadcrumbs::for('frontend.opportunity.project.reviews', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.reviews'), route('frontend.opportunity.project.reviews'));
});

Breadcrumbs::for('frontend.opportunity.project.show', function ($trail, $id) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.view'), route('frontend.opportunity.project.show', $id));
});

Breadcrumbs::for('frontend.opportunity.project.edit', function ($trail, $id) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.edit'), route('frontend.opportunity.project.edit', $id));
});

Breadcrumbs::for('frontend.opportunity.project.add_attachment', function ($trail, $project) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.add_attachment'), route('frontend.opportunity.project.add_attachment', $project));
});

Breadcrumbs::for('frontend.opportunity.project.edit_attachment', function ($trail, $project, $media) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.edit_attachment'), route('frontend.opportunity.project.edit_attachment', $project, $media));
});
