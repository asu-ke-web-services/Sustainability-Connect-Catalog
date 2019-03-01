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
     * Project CRUD - must be signed-in
     */
    Route::get('project/submit', 'ProjectController@create')->name('project.create');
    Route::post('project/follow/{project}', 'ProjectUserController@follow')->name('project.follow');
    Route::post('project/unfollow/{project}', 'ProjectUserController@unfollow')->name('project.unfollow');
    Route::post('project/apply/{project}', 'ProjectUserController@apply')->name('project.apply');
    Route::post('project/cancel-application/{project}', 'ProjectUserController@cancelApplication')->name('project.cancelApplication');

    /*
     * Internship CRUD - must be signed-in
     */
    Route::post('internship/follow/{internship}', 'InternshipUserController@follow')->name('internship.follow');
    Route::post('internship/unfollow/{internship}', 'InternshipUserController@unfollow')->name('internship.unfollow');
    Route::post('internship/apply/{internship}', 'InternshipUserController@apply')->name('internship.apply');
    Route::post('internship/cancel-application/{internship}', 'InternshipUserController@cancelApplication')->name('internship.cancelApplication');
});

Route::group([
    'as'         => 'opportunity.',
    'namespace'  => 'Opportunity',
], function () {

    /*
     * Project CRUD
     */
    Route::get('project', 'ProjectSearchController@searchActive')->name('project.search_active');
    Route::get('project/completed', 'ProjectSearchController@searchCompleted')->name('project.search_completed');
    Route::post('project', 'ProjectController@store')->name('project.store');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show');

    /*
     * Internship CRUD
     */
    Route::get('internship', 'InternshipController@index')->name('internship.index');
    Route::get('internship/{internship}', 'InternshipController@show')->name('internship.show');
});
