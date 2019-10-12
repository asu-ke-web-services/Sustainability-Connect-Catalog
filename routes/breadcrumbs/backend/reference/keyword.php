<?php

Breadcrumbs::for('admin.reference.keyword.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Keyword Management'), route('admin.reference.keyword.index'));
});

Breadcrumbs::for('admin.reference.keyword.create', function ($trail) {
    $trail->parent('admin.reference.keyword.index');
    $trail->push(__('Create Keyword'), route('admin.reference.keyword.create'));
});

Breadcrumbs::for('admin.reference.keyword.edit', function ($trail, $id) {
    $trail->parent('admin.reference.keyword.index');
    $trail->push(__('Edit Keyword'), route('admin.reference.keyword.edit', $id));
});
