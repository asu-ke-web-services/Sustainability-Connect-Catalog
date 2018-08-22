<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('organizations', 'OrganizationController');

Route::resource('projects', 'ProjectController');
Route::resource('internships', 'InternshipController');


Route::get('projects/submit_idea', 'ProjectController@create_idea');

Route::get('projects/{project}/admin', 'ProjectController@show_admin')->name('projects.show_admin');
Route::get('internships/{internship}/admin', 'InternshipController@show_admin')->name('internships.show_admin');

Route::get('projects/{project}/follow', 'OpportunityUserController@add_follower')->name('projects.add_follower');
