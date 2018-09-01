<?php

Breadcrumbs::for('admin.lookup.affiliation.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Affiliation Management'), route('admin.lookup.affiliation.index'));
});

Breadcrumbs::for('admin.lookup.affiliation.create', function ($trail) {
    $trail->parent('admin.lookup.affiliation.index');
    $trail->push(__('Create Affiliation'), route('admin.lookup.affiliation.create'));
});

Breadcrumbs::for('admin.lookup.affiliation.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.affiliation.index');
    $trail->push(__('Edit Affiliation'), route('admin.lookup.affiliation.edit', $id));
});
