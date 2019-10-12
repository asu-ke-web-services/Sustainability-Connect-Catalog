<?php

Breadcrumbs::for('frontend.user.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('frontend.user.dashboard'));
});

require __DIR__ . '/opportunity.php';
require __DIR__ . '/organization.php';
require __DIR__ . '/report.php';
