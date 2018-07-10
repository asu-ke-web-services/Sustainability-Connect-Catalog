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

Route::resource('opportunities', 'OpportunityController');

Route::get('projects/submit_idea', 'ProjectController@create_idea');
Route::get('projects/search', 'SearchController@search');

Route::resource('projects', 'ProjectController');


Route::resource('internships', 'InternshipController');
