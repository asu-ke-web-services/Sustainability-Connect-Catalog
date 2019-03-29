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
    Route::get('project/create', 'ProjectController@create')->name('project.create');
    Route::post('project', 'ProjectController@store')->name('project.store');
    Route::get('project/{project}/edit', 'ProjectController@edit')->name('project.edit');
    Route::post('project/{project}', 'ProjectController@update')->name('project.update');

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
    Route::get('project', 'ProjectSearchController@searchActive')->name('project.search_active');
    Route::get('project/completed', 'ProjectSearchController@searchCompleted')->name('project.search_completed');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show');

    /*
     * Internship frontend access
     */
    Route::get('internship', 'InternshipSearchController@searchActive')->name('internship.search_active');
    Route::get('internship/{internship}', 'InternshipController@show')->name('internship.show');
});
