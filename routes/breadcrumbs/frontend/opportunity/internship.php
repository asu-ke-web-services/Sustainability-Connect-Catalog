<?php

Breadcrumbs::for('frontend.opportunity.internship.index', function ($trail) {
    $trail->parent('frontend.dashboard');
    $trail->push(__('labels.backend.opportunity.internships.management'), route('frontend.opportunity.internship.index'));
});

Breadcrumbs::for('frontend.opportunity.internship.active', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.active'), route('frontend.opportunity.internship.active'));
});

Breadcrumbs::for('frontend.opportunity.internship.all', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.all'), route('frontend.opportunity.internship.all'));
});

Breadcrumbs::for('frontend.opportunity.internship.inactive', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.inactive'), route('frontend.opportunity.internship.inactive'));
});

Breadcrumbs::for('frontend.opportunity.internship.deleted', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.deleted'), route('frontend.opportunity.internship.deleted'));
});

Breadcrumbs::for('frontend.opportunity.internship.create', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('labels.backend.opportunity.internships.create'), route('frontend.opportunity.internship.create'));
});

Breadcrumbs::for('frontend.opportunity.internship.import_review', function ($trail) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.import_review'), route('frontend.opportunity.internship.import_review'));
});

Breadcrumbs::for('frontend.opportunity.internship.show', function ($trail, $id) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.view'), route('frontend.opportunity.internship.show', $id));
});

Breadcrumbs::for('frontend.opportunity.internship.edit', function ($trail, $id) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.edit'), route('frontend.opportunity.internship.edit', $id));
});

Breadcrumbs::for('frontend.opportunity.internship.add_attachment', function ($trail, $internship) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.add_attachment'), route('frontend.opportunity.internship.add_attachment', $internship));
});

Breadcrumbs::for('frontend.opportunity.internship.edit_attachment', function ($trail, $internship, $media) {
    $trail->parent('frontend.opportunity.internship.index');
    $trail->push(__('menus.backend.opportunity.internships.edit_attachment'), route('frontend.opportunity.internship.edit_attachment', $internship, $media));
});
