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
    Route::post('project', 'ProjectController@index')->name('project.index');
    Route::post('project/{project}', 'ProjectController@show')->name('project.show');

    /*
     * Internship CRUD
     */
    Route::post('internship', 'InternshipController@index')->name('internship.index');
    Route::post('internship/{internship}', 'InternshipController@show')->name('internship.show');

});
