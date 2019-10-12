<?php

Breadcrumbs::for('admin.reference.opportunity_status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Opportunity Status Management'), route('admin.reference.opportunity_status.index'));
});

Breadcrumbs::for('admin.reference.opportunity_status.create', function ($trail) {
    $trail->parent('admin.reference.opportunity_status.index');
    $trail->push(__('Create Opportunity Status'), route('admin.reference.opportunity_status.create'));
});

Breadcrumbs::for('admin.reference.opportunity_status.edit', function ($trail, $id) {
    $trail->parent('admin.reference.opportunity_status.index');
    $trail->push(__('Edit Opportunity Status'), route('admin.reference.opportunity_status.edit', $id));
});
