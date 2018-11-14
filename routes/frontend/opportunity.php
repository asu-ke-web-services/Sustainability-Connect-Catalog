<?php

/**
 * Opportunity Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group([
    'namespace'  => 'Opportunity',
], function () {

    /*
     * Project CRUD
     */
    Route::get('project', 'ProjectController@index')->name('project.index');
    Route::get('project/completed', 'ProjectController@completed')->name('project.completed');
    Route::get('project/submit', 'ProjectController@create')->name('project.create');
    Route::post('project', 'ProjectController@store')->name('project.store');
    Route::get('project/{opportunity}', 'ProjectController@show')->name('project.show');
    Route::post('project/follow/{opportunity}', 'ProjectFollowerController@follow')->name('project.follow');
    Route::post('project/unfollow/{opportunity}', 'ProjectFollowerController@unfollow')->name('project.unfollow');
    Route::post('project/apply/{opportunity}', 'ProjectController@apply')->name('project.apply');

    /*
     * Internship CRUD
     */
    Route::get('internship', 'InternshipController@index')->name('internship.index');
    Route::get('internship/{opportunity}', 'InternshipController@show')->name('internship.show');
    Route::post('internship/follow/{opportunity}', 'InternshipFollowerController@follow')->name('internship.follow');
    Route::post('internship/unfollow/{opportunity}', 'InternshipFollowerController@unfollow')->name('internship.unfollow');
    Route::post('internship/apply/{opportunity}', 'InternshipController@apply')->name('internship.apply');
});
