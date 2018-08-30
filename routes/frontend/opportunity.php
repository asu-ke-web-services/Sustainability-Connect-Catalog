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
    Route::resource('project', 'ProjectController');

});
