<?php

Breadcrumbs::for('admin.lookup.opportunity_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Opportunity Type Management'), route('admin.lookup.opportunity_type.index'));
});

Breadcrumbs::for('admin.lookup.opportunity_type.create', function ($trail) {
    $trail->parent('admin.lookup.opportunity_type.index');
    $trail->push(__('Create Opportunity Type'), route('admin.lookup.opportunity_type.create'));
});

Breadcrumbs::for('admin.lookup.opportunity_type.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.opportunity_type.index');
    $trail->push(__('Edit Opportunity Type'), route('admin.lookup.opportunity_type.edit', $id));
});
