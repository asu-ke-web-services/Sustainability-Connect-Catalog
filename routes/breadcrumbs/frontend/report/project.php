<?php

Breadcrumbs::for('frontend.report.project.active_users', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('menus.backend.report.projects.active_users'), route('frontend.report.project.active_users'));
});

Breadcrumbs::for('frontend.report.project.active', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.active'), route('frontend.report.project.active'));
});

Breadcrumbs::for('frontend.report.project.expired', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.expired'), route('frontend.report.project.expired'));
});

Breadcrumbs::for('frontend.report.project.invalid_open', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.invalid_open'), route('frontend.report.project.invalid_open'));
});

Breadcrumbs::for('frontend.report.project.future', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('menus.backend.opportunity.projects.future'), route('frontend.report.project.future'));
});
