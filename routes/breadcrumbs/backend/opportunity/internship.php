<?php

Breadcrumbs::for('admin.opportunity.internship.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.opportunity.internships.management'), route('admin.opportunity.internship.index'));
});

Breadcrumbs::for('admin.opportunity.internship.active', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.active'), route('admin.opportunity.internship.active'));
});

Breadcrumbs::for('admin.opportunity.internship.all', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.all'), route('admin.opportunity.internship.all'));
});

Breadcrumbs::for('admin.opportunity.internship.inactive', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.inactive'), route('admin.opportunity.internship.inactive'));
});

Breadcrumbs::for('admin.opportunity.internship.deleted', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.deleted'), route('admin.opportunity.internship.deleted'));
});

Breadcrumbs::for('admin.opportunity.internship.create', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('labels.backend.opportunity.internships.create'), route('admin.opportunity.internship.create'));
});

Breadcrumbs::for('admin.opportunity.internship.import_review', function ($trail) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.import_review'), route('admin.opportunity.internship.import_review'));
});

Breadcrumbs::for('admin.opportunity.internship.show', function ($trail, $id) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.view'), route('admin.opportunity.internship.show', $id));
});

Breadcrumbs::for('admin.opportunity.internship.edit', function ($trail, $id) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.edit'), route('admin.opportunity.internship.edit', $id));
});

Breadcrumbs::for('admin.opportunity.internship.add_attachment', function ($trail, $internship) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.add_attachment'), route('admin.opportunity.internship.add_attachment', $internship));
});

Breadcrumbs::for('admin.opportunity.internship.edit_attachment', function ($trail, $internship, $media) {
    $trail->parent('admin.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.edit_attachment'), route('admin.opportunity.internship.edit_attachment', $internship, $media));
});
