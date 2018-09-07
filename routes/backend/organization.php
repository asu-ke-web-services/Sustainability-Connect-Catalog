<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::group([
    // 'prefix'     => 'opportunity',
    // 'as'         => 'opportunity.',
    'namespace'  => 'Organization',
    //    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /* Organization CRUD */
    Route::resource('organization', 'OrganizationController');

});
