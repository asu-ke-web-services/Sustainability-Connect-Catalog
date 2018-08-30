<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');


/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

// Route::resource('projects', 'ProjectController');
// Route::resource('internships', 'InternshipController');
// Route::get('projects/submit_idea', 'ProjectController@create_idea');

// Route::get('projects/{project}/admin', 'ProjectController@show_admin')->name('projects.show_admin');
// Route::get('internships/{internship}/admin', 'InternshipController@show_admin')->name('internships.show_admin');

// Route::get('projects/{project}/follow', 'OpportunityUserController@add_follower')->name('projects.add_follower');


/*
 * Backend Routes
 * Namespaces indicate folder structure
 */

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});
