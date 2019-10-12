<?php

Breadcrumbs::for('admin.reference.affiliation.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Affiliation Management'), route('admin.reference.affiliation.index'));
});

Breadcrumbs::for('admin.reference.affiliation.create', function ($trail) {
    $trail->parent('admin.reference.affiliation.index');
    $trail->push(__('Create Affiliation'), route('admin.reference.affiliation.create'));
});

Breadcrumbs::for('admin.reference.affiliation.edit', function ($trail, $id) {
    $trail->parent('admin.reference.affiliation.index');
    $trail->push(__('Edit Affiliation'), route('admin.reference.affiliation.edit', $id));
});
