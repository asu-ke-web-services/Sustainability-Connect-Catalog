<?php

/**
 * All route names are prefixed with 'admin.opportunity'.
 */
Route::group([
    'prefix'     => 'opportunity',
    'as'         => 'opportunity.',
    'namespace'  => 'Opportunity',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /* Project CRUD */
    Route::resource('project', 'ProjectController');

    /* Internship CRUD */
    Route::resource('internship', 'InternshipController');

});
