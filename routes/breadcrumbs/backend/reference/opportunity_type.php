<?php

Breadcrumbs::for('admin.reference.opportunity_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Opportunity Type Management'), route('admin.reference.opportunity_type.index'));
});

Breadcrumbs::for('admin.reference.opportunity_type.create', function ($trail) {
    $trail->parent('admin.reference.opportunity_type.index');
    $trail->push(__('Create Opportunity Type'), route('admin.reference.opportunity_type.create'));
});

Breadcrumbs::for('admin.reference.opportunity_type.edit', function ($trail, $id) {
    $trail->parent('admin.reference.opportunity_type.index');
    $trail->push(__('Edit Opportunity Type'), route('admin.reference.opportunity_type.edit', $id));
});
