<?php

/**
 * Opportunity Controllers
 * All route names are prefixed with 'backend.'.
 */
Route::group([
    'namespace'  => 'Opportunity',
], function () {

    /*
     * Project CRUD
     */
    Route::resource('project', 'ProjectController');

    /*
     * Internship CRUD
     */
    Route::resource('internship', 'InternshipController');

});
