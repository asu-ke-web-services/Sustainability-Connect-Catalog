<?php

Breadcrumbs::for('admin.reference.user_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('User Type Management'), route('admin.reference.user_type.index'));
});

Breadcrumbs::for('admin.reference.user_type.create', function ($trail) {
    $trail->parent('admin.reference.user_type.index');
    $trail->push(__('Create User Type'), route('admin.reference.user_type.create'));
});

Breadcrumbs::for('admin.reference.user_type.edit', function ($trail, $id) {
    $trail->parent('admin.reference.user_type.index');
    $trail->push(__('Edit User Type'), route('admin.reference.user_type.edit', $id));
});
