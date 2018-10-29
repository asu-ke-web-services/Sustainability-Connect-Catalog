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
    Route::get('project/deactivated', 'ProjectStatusController@getDeactivated')->name('project.deactivated');
    Route::get('project/deleted', 'ProjectStatusController@getDeleted')->name('project.deleted');
    Route::get('project/review', 'ProjectStatusController@getNeedsReview')->name('project.need_review');

    /* Internship CRUD */
    Route::resource('internship', 'InternshipController');

    /*
     * Internship Status'
     */
    Route::get('internship/deactivated', 'InternshipStatusController@getDeactivated')->name('internship.deactivated');
    Route::get('internship/deleted', 'InternshipStatusController@getDeleted')->name('internship.deleted');
    Route::get('internship/review', 'InternshipStatusController@getNeedsReview')->name('internship.need_review');

});
