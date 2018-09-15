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
    Route::get('project/submit', 'ProjectController@create')->name('project.create');
    Route::post('project', 'ProjectController@store')->name('project.store');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show');

    /*
     * Internship CRUD
     */
    Route::get('internship', 'InternshipController@index')->name('internship.index');
    Route::get('internship/{internship}', 'InternshipController@show')->name('internship.show');
});
