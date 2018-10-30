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

    /*
     * Project Status'
     */
    Route::get('project/deactivated', 'ProjectController@getDeactivated')->name('project.deactivated');
    Route::get('project/deleted', 'ProjectController@getDeleted')->name('project.deleted');
    Route::get('project/review', 'ProjectController@getNeedsReview')->name('project.needs_review');

    /* Internship CRUD */
    Route::resource('internship', 'InternshipController');

    /*
     * Internship Status'
     */
    Route::get('internship/deactivated', 'InternshipController@getDeactivated')->name('internship.deactivated');
    Route::get('internship/deleted', 'InternshipController@getDeleted')->name('internship.deleted');
    Route::get('internship/review', 'InternshipController@getNeedsReview')->name('internship.needs_review');

});
