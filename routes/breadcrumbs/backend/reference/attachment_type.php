<?php

Breadcrumbs::for('admin.reference.attachment_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Attachment Type Management'), route('admin.reference.attachment_type.index'));
});

Breadcrumbs::for('admin.reference.attachment_type.create', function ($trail) {
    $trail->parent('admin.reference.attachment_type.index');
    $trail->push(__('Create Attachment Type'), route('admin.reference.attachment_type.create'));
});

Breadcrumbs::for('admin.reference.attachment_type.edit', function ($trail, $id) {
    $trail->parent('admin.reference.attachment_type.index');
    $trail->push(__('Edit Attachment Type'), route('admin.reference.attachment_type.edit', $id));
});
