<?php

/**
 * All route names are prefixed with 'admin.report'.
 */
Route::group([
    'prefix' => 'report',
    'as' => 'report.',
    'namespace' => 'Report',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Project Reports
     */
    Route::get('project/active-users', 'ProjectReportController@getActiveUsers')->name('project.active_users');
});

Route::group([
    'prefix' => 'report',
    'as' => 'report.',
    'namespace' => 'Opportunity',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Project Reports
     */
    Route::get('project/active', 'ProjectStatusController@getActive')->name('project.active');
    Route::get('project/expired', 'ProjectStatusController@getExpired')->name('project.expired');
    Route::get('project/invalid_open', 'ProjectStatusController@getInvalidOpen')->name('project.invalid_open');
    Route::get('project/future', 'ProjectStatusController@getFuture')->name('project.future');
});
