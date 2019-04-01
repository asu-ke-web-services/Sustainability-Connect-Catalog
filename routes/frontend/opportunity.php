<?php

/**
 * Opportunity Controllers
 * All route names are prefixed with 'frontend.opportunity'.
 */

Route::group([
    'as'         => 'opportunity.',
    'namespace'  => 'Opportunity',
    'middleware' => ['auth', 'password_expires']
], function () {
    /*
     * Project membership action - must be signed-in
     */
    Route::post('project/follow/{project}', 'ProjectUserController@follow')->name('project.follow');
    Route::post('project/unfollow/{project}', 'ProjectUserController@unfollow')->name('project.unfollow');
    Route::post('project/apply/{project}', 'ProjectUserController@apply')->name('project.apply');
    Route::post('project/cancel-application/{project}', 'ProjectUserController@cancelApplication')->name('project.cancelApplication');

    Route::get('project/{project}/manage', 'ProjectPrivateController@show')->name('project.show_private');
    Route::get('project/{project}/print', 'ProjectPrivateController@print')->name('project.print');

    /*
     * Project Proposal CRUD - must be signed-in
     */
    Route::get('project/submission/create', 'ProjectSubmissionController@create')->name('project.submission.create');
    Route::post('project/submission', 'ProjectSubmissionController@store')->name('project.submission.store');
    Route::get('project/submission/{project}/edit', 'ProjectSubmissionController@edit')->name('project.submission.edit');
    Route::post('project/submission/{project}', 'ProjectSubmissionController@update')->name('project.submission.update');

    /*
     * Project Listing CRUD - must be signed-in
     */
    Route::get('project/create', 'ProjectPrivateController@create')->name('project.create');
    Route::post('project', 'ProjectPrivateController@store')->name('project.store');
    Route::get('project/{project}/edit', 'ProjectPrivateController@edit')->name('project.edit');
    Route::post('project/{project}', 'ProjectPrivateController@update')->name('project.update');

    /*
     * Internship membership action - must be signed-in
     */
    Route::post('internship/follow/{internship}', 'InternshipUserController@follow')->name('internship.follow');
    Route::post('internship/unfollow/{internship}', 'InternshipUserController@unfollow')->name('internship.unfollow');
    Route::post('internship/apply/{internship}', 'InternshipUserController@apply')->name('internship.apply');
    Route::post('internship/cancel-application/{internship}', 'InternshipUserController@cancelApplication')->name('internship.cancelApplication');

    /*
     * Internship Submission CRUD - must be signed-in
     */
    Route::get('internship/submission/create', 'InternshipSubmissionController@create')->name('internship.submission.create');
    Route::post('internship/submission', 'InternshipSubmissionController@store')->name('internship.submission.store');
    Route::get('internship/submission/{internship}/edit', 'InternshipSubmissionController@edit')->name('internship.submission.edit');
    Route::post('internship/submission/{internship}', 'InternshipSubmissionController@update')->name('internship.submission.update');
});

Route::group([
    'as'         => 'opportunity.',
    'namespace'  => 'Opportunity',
], function () {

    /*
     * Project frontend access
     */
    Route::get('project', 'ProjectPublicController@index_active')->name('project.active');
    Route::get('project/completed', 'ProjectPublicController@index_completed')->name('project.completed');
    Route::get('project/{project}', 'ProjectPublicController@show')->name('project.show_public');

    /*
     * Internship frontend access
     */
    Route::get('internship', 'InternshipSearchController@searchActive')->name('internship.search_active');
    Route::get('internship/{internship}', 'InternshipController@show')->name('internship.show');
});
