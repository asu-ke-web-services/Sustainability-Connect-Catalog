<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'SCCatalog\Http\Controllers\Backend',
], function () {
 // custom admin routes
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('keyword', 'KeywordCrudController');
    CRUD::resource('opportunity_status', 'OpportunityStatusCrudController');
    CRUD::resource('opportunity_type', 'OpportunityTypeCrudController');
    CRUD::resource('organization_status', 'OrganizationStatusCrudController');
    CRUD::resource('organization_type', 'OrganizationTypeCrudController');
    CRUD::resource('student_degree_level', 'StudentDegreelevelCrudController');
}); // this should be the absolute last line of this file
