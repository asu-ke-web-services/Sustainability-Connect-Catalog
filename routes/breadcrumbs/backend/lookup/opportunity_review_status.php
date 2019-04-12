<?php

Breadcrumbs::for('admin.lookup.opportunity_review_status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Opportunity Review Status Management'), route('admin.lookup.opportunity_review_status.index'));
});

Breadcrumbs::for('admin.lookup.opportunity_review_status.create', function ($trail) {
    $trail->parent('admin.lookup.opportunity_review_status.index');
    $trail->push(__('Create Opportunity Review Status'), route('admin.lookup.opportunity_review_status.create'));
});

Breadcrumbs::for('admin.lookup.opportunity_review_status.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.opportunity_review_status.index');
    $trail->push(__('Edit Opportunity Review Status'), route('admin.lookup.opportunity_review_status.edit', $id));
});
