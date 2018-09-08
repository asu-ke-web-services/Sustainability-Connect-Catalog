<?php

Breadcrumbs::for('admin.opportunity.internship.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.opportunity.internships.management'), route('admin.opportunity.internship.index'));
});

Breadcrumbs::for('admin.opportunity.internship.deactivated', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.deactivated'), route('admin.opportunity.internship.deactivated'));
});

Breadcrumbs::for('admin.opportunity.internship.deleted', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.deleted'), route('admin.opportunity.internship.deleted'));
});

Breadcrumbs::for('admin.opportunity.internship.create', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('labels.backend.opportunity.internships.create'), route('admin.opportunity.internship.create'));
});

Breadcrumbs::for('admin.opportunity.internship.show', function ($trail, $id) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.view'), route('admin.opportunity.internship.show', $id));
});

Breadcrumbs::for('admin.opportunity.internship.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.edit'), route('admin.opportunity.internship.edit', $id));
});
