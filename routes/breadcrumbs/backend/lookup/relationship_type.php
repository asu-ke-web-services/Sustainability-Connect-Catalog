<?php

Breadcrumbs::for('admin.lookup.relationship_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Relationship Type Management'), route('admin.lookup.relationship_type.index'));
});

Breadcrumbs::for('admin.lookup.relationship_type.create', function ($trail) {
    $trail->parent('admin.lookup.relationship_type.index');
    $trail->push(__('Create Relationship Type'), route('admin.lookup.relationship_type.create'));
});

Breadcrumbs::for('admin.lookup.relationship_type.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.relationship_type.index');
    $trail->push(__('Edit Relationship Type'), route('admin.lookup.relationship_type.edit', $id));
});
