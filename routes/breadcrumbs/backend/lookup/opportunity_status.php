<?php

Breadcrumbs::for('admin.lookup.opportunity_status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Opportunity Status Management'), route('admin.lookup.opportunity_status.index'));
});

Breadcrumbs::for('admin.lookup.opportunity_status.create', function ($trail) {
    $trail->parent('admin.lookup.opportunity_status.index');
    $trail->push(__('Create Opportunity Status'), route('admin.lookup.opportunity_status.create'));
});

Breadcrumbs::for('admin.lookup.opportunity_status.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.opportunity_status.index');
    $trail->push(__('Edit Opportunity Status'), route('admin.lookup.opportunity_status.edit', $id));
});
