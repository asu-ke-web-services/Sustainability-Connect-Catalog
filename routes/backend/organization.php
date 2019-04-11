<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::group([
    // 'prefix'     => 'opportunity',
    // 'as'         => 'opportunity.',
    'namespace' => 'Organization',
    //    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Organization Status'
     */
    Route::get('organization/active', 'OrganizationStatusController@getActive')->name('organization.active');
    Route::get('organization/inactive', 'OrganizationStatusController@getInactive')->name('organization.inactive');
    Route::get('organization/deleted', 'OrganizationStatusController@getDeleted')->name('organization.deleted');

    /* Organization CRUD */
    Route::resource('organization', 'OrganizationController');
});
