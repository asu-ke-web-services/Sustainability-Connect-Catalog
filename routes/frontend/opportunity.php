<?php

/**
 * Opportunity Controllers
 * All route names are prefixed with 'frontend.opportunity'.
 */
Route::group([
//    'prefix'     => 'opportunity',
    'as'         => 'opportunity.',
    'namespace'  => 'Opportunity',
], function () {

    /*
     * Project CRUD
     */
    Route::get('project', 'ProjectController@index')->name('project.index');
    Route::get('project/completed', 'ProjectController@completed')->name('project.completed');
    Route::get('project/submit', 'ProjectController@create')->name('project.create');
    Route::post('project', 'ProjectController@store')->name('project.store');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show');
    Route::post('project/follow/{project}', 'ProjectFollowerController@follow')->name('project.follow');
    Route::post('project/unfollow/{project}', 'ProjectFollowerController@unfollow')->name('project.unfollow');
    Route::post('project/apply/{project}', 'ProjectController@apply')->name('project.apply');

    /*
     * Internship CRUD
     */
    Route::get('internship', 'InternshipController@index')->name('internship.index');
    Route::get('internship/{internship}', 'InternshipController@show')->name('internship.show');
    Route::post('internship/follow/{internship}', 'InternshipFollowerController@follow')->name('internship.follow');
    Route::post('internship/unfollow/{internship}', 'InternshipFollowerController@unfollow')->name('internship.unfollow');
    Route::post('internship/apply/{internship}', 'InternshipController@apply')->name('internship.apply');
});
