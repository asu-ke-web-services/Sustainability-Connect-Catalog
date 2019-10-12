<?php

Breadcrumbs::for('admin.reference.category.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Category Management'), route('admin.reference.category.index'));
});

Breadcrumbs::for('admin.reference.category.create', function ($trail) {
    $trail->parent('admin.reference.category.index');
    $trail->push(__('Create Category'), route('admin.reference.category.create'));
});

Breadcrumbs::for('admin.reference.category.edit', function ($trail, $id) {
    $trail->parent('admin.reference.category.index');
    $trail->push(__('Edit Category'), route('admin.reference.category.edit', $id));
});
