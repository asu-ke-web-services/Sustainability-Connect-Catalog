<?php

Breadcrumbs::for('admin.report.project.active_users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.report.projects.active_users'), route('admin.report.project.active_users'));
});
