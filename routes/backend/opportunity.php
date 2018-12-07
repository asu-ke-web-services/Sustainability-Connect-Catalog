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

    /*
     * Project Status'
     */
    Route::get('project/active', 'ProjectStatusController@getActive')->name('project.active');
    Route::get('project/archived', 'ProjectStatusController@getArchived')->name('project.archived');
    Route::get('project/completed', 'ProjectStatusController@getCompleted')->name('project.completed');
    Route::get('project/deleted', 'ProjectStatusController@getDeleted')->name('project.deleted');
    Route::get('project/expired', 'ProjectStatusController@getExpired')->name('project.expired');
    Route::get('project/import_review', 'ProjectStatusController@getImportReview')->name('project.import_review');
    Route::get('project/reviews', 'ProjectStatusController@getProposalReviews')->name('project.reviews');
    Route::get('project/search', 'ProjectController@search')->name('project.search');

    /* Project CRUD */
    Route::resource('project', 'ProjectController');

    /*
     * Specific Project
     */
    Route::group(['prefix' => 'project/{project}'], function () {
        Route::get('clone', 'ProjectController@clone')->name('project.clone');

        // Deleted
        Route::get('delete', 'ProjectStatusController@delete')->name('project.delete-permanently');
        Route::get('restore', 'ProjectStatusController@restore')->name('project.restore');
    });


    /*
     * Internship Status'
     */
    Route::get('internship/active', 'InternshipStatusController@getActive')->name('internship.active');
    Route::get('internship/inactive', 'InternshipStatusController@getInactive')->name('internship.inactive');
    Route::get('internship/deleted', 'InternshipStatusController@getDeleted')->name('internship.deleted');
    Route::get('internship/import_review', 'InternshipStatusController@getImportReview')->name('internship.import_review');

    /* Internship CRUD */
    Route::resource('internship', 'InternshipController');

    /*
     * Specific Project
     */
    Route::group(['prefix' => 'internship/{internship}'], function () {
        Route::get('clone', 'InternshipController@clone')->name('internship.clone');

        // Deleted
        Route::get('delete', 'InternshipStatusController@delete')->name('internship.delete-permanently');
        Route::get('restore', 'InternshipStatusController@restore')->name('internship.restore');
    });
});
