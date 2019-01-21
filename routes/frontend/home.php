<?php

use SCCatalog\Http\Controllers\Frontend\HomeController;
use SCCatalog\Http\Controllers\Frontend\ContactController;
use SCCatalog\Http\Controllers\Frontend\User\AccountController;
use SCCatalog\Http\Controllers\Frontend\User\ProfileController;
use SCCatalog\Http\Controllers\Frontend\User\DashboardController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', function () {
    return redirect()->route('frontend.user.dashboard');
})->name('index');
// Route::get('contact', [ContactController::class, 'index'])->name('contact');
// Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
