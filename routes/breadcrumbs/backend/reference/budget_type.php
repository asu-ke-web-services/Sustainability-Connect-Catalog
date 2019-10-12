<?php

Breadcrumbs::for('admin.reference.budget_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Budget Type Management'), route('admin.reference.budget_type.index'));
});

Breadcrumbs::for('admin.reference.budget_type.create', function ($trail) {
    $trail->parent('admin.reference.budget_type.index');
    $trail->push(__('Create Budget Type'), route('admin.reference.budget_type.create'));
});

Breadcrumbs::for('admin.reference.budget_type.edit', function ($trail, $id) {
    $trail->parent('admin.reference.budget_type.index');
    $trail->push(__('Edit Budget Type'), route('admin.reference.budget_type.edit', $id));
});
