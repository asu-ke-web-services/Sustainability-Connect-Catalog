<?php

Breadcrumbs::for('admin.opportunity.internship.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Internship Management'), route('admin.opportunity.internship.index'));
});

Breadcrumbs::for('admin.opportunity.internship.create', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('Create Internship'), route('admin.opportunity.internship.create'));
});

Breadcrumbs::for('admin.opportunity.internship.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('Edit Internship'), route('admin.opportunity.internship.edit', $id));
});
