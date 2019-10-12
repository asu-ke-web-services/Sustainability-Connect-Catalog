<?php

Breadcrumbs::for('admin.report.project.active_users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.report.projects.active_users'), route('admin.report.project.active_users'));
});

Breadcrumbs::for('admin.report.project.active', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.active'), route('admin.report.project.active'));
});

Breadcrumbs::for('admin.report.project.expired', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.expired'), route('admin.report.project.expired'));
});

Breadcrumbs::for('admin.report.project.invalid_open', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.invalid_open'), route('admin.report.project.invalid_open'));
});

Breadcrumbs::for('admin.report.project.future', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.future'), route('admin.report.project.future'));
});
