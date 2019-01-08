<?php

/**
 * All route names are prefixed with 'admin.report'.
 */
Route::group([
    'prefix'     => 'report',
    'as'         => 'report.',
    'namespace'  => 'Report',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Project Reports
     */
    Route::get('project/active-users', 'ProjectReportController@getActiveUsers')->name('project.active_users');

});
