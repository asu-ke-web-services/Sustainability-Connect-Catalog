<?php

Breadcrumbs::for('frontend.opportunity.project.private.index', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('labels.backend.opportunity.projects.management'), route('frontend.opportunity.project.index'));
});

Breadcrumbs::for('frontend.opportunity.project.private.active', function ($trail) {
    $trail->parent('frontend.opportunity.project.private.index');
    $trail->push(__('menus.backend.opportunity.projects.active'), route('frontend.opportunity.project.active'));
});

Breadcrumbs::for('frontend.opportunity.project.private.completed', function ($trail) {
    $trail->parent('frontend.opportunity.project.private.index');
    $trail->push(__('menus.backend.opportunity.projects.private.completed'), route('frontend.opportunity.project.private.completed'));
});

Breadcrumbs::for('frontend.opportunity.project.private.create', function ($trail) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('labels.backend.opportunity.projects.create'), route('frontend.opportunity.project.create'));
});

Breadcrumbs::for('frontend.opportunity.project.show', function ($trail, $id) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.view'), route('frontend.opportunity.project.show', $id));
});

Breadcrumbs::for('frontend.opportunity.project.edit', function ($trail, $id) {
    $trail->parent('frontend.opportunity.project.index');
    $trail->push(__('menus.backend.opportunity.projects.edit'), route('frontend.opportunity.project.edit', $id));
});

Breadcrumbs::for('frontend.opportunity.project.private.attachment.add', function ($trail, $project) {
    $trail->parent('frontend.opportunity.project.private.index');
    $trail->push(__('menus.backend.opportunity.projects.add_attachment'), route('frontend.opportunity.project.private.attachment.add', $project));
});

Breadcrumbs::for('frontend.opportunity.project.private.attachment.edit', function ($trail, $project, $media) {
    $trail->parent('frontend.opportunity.project.private.index');
    $trail->push(__('menus.backend.opportunity.projects.private.attachment.edit'), route('frontend.opportunity.project.private.attachment.edit', $project, $media));
});
