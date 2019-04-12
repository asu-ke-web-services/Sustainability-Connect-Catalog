<?php

Breadcrumbs::for('admin.lookup.user_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('User Type Management'), route('admin.lookup.user_type.index'));
});

Breadcrumbs::for('admin.lookup.user_type.create', function ($trail) {
    $trail->parent('admin.lookup.user_type.index');
    $trail->push(__('Create User Type'), route('admin.lookup.user_type.create'));
});

Breadcrumbs::for('admin.lookup.user_type.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.user_type.index');
    $trail->push(__('Edit User Type'), route('admin.lookup.user_type.edit', $id));
});
