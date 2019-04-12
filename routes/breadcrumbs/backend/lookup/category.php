<?php

Breadcrumbs::for('admin.lookup.category.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Category Management'), route('admin.lookup.category.index'));
});

Breadcrumbs::for('admin.lookup.category.create', function ($trail) {
    $trail->parent('admin.lookup.category.index');
    $trail->push(__('Create Category'), route('admin.lookup.category.create'));
});

Breadcrumbs::for('admin.lookup.category.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.category.index');
    $trail->push(__('Edit Category'), route('admin.lookup.category.edit', $id));
});
