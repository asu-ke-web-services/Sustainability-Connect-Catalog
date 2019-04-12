<?php

Breadcrumbs::for('admin.lookup.attachment_type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Attachment Type Management'), route('admin.lookup.attachment_type.index'));
});

Breadcrumbs::for('admin.lookup.attachment_type.create', function ($trail) {
    $trail->parent('admin.lookup.attachment_type.index');
    $trail->push(__('Create Attachment Type'), route('admin.lookup.attachment_type.create'));
});

Breadcrumbs::for('admin.lookup.attachment_type.edit', function ($trail, $id) {
    $trail->parent('admin.lookup.attachment_type.index');
    $trail->push(__('Edit Attachment Type'), route('admin.lookup.attachment_type.edit', $id));
});
