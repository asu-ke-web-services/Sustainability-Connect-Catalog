<?php

Breadcrumbs::for('admin.lookup.student_degree_level.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Student Degree Level Management'), route('admin.lookup.student_degree_level.index'));
});

Breadcrumbs::for('admin.lookup.student_degree_level.create', function ($trail) {
    $trail->parent('admin.lookup.student_degree_level.index');
    $trail->push(__('Create Student Degree Level'), route('admin.lookup.student_degree_level.create'));
});

Breadcrumbs::for('admin.lookup.student_degree_level.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.student_degree_level.index');
    $trail->push(__('Edit Student Degree Level'), route('admin.lookup.student_degree_level.edit', $id));
});
