<?php

Breadcrumbs::for('admin.opportunity.project.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Project Management'), route('admin.opportunity.project.index'));
});

Breadcrumbs::for('admin.opportunity.project.create', function ($trail) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('Create Project'), route('admin.opportunity.project.create'));
});

Breadcrumbs::for('admin.opportunity.project.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.project.index');
    $trail->push(__('Edit Project'), route('admin.opportunity.project.edit', $id));
});
