<?php

Breadcrumbs::for('admin.lookup.keyword.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Keyword Management'), route('admin.lookup.keyword.index'));
});

Breadcrumbs::for('admin.lookup.keyword.create', function ($trail) {
    $trail->parent('admin.lookup.keyword.index');
    $trail->push(__('Create Keyword'), route('admin.lookup.keyword.create'));
});

Breadcrumbs::for('admin.lookup.keyword.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.keyword.index');
    $trail->push(__('Edit Keyword'), route('admin.lookup.keyword.edit', $id));
});
