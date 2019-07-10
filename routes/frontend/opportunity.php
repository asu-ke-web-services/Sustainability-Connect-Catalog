<?php

/**
 * Opportunity Controllers
 * All route names are prefixed with 'frontend.opportunity'.
 */
Route::group([
    'as' => 'opportunity.',
    'namespace' => 'Opportunity',
    'middleware' => ['auth', 'password_expires'],
], function () {

    /*
     * Project Proposal CRUD - must be signed-in
     */
    Route::get('project/submission/create', 'ProjectSubmissionController@create')->name('project.public.create');
    Route::post('project/submission', 'ProjectSubmissionController@store')->name('project.public.store');
    Route::get('project/submission/{project}/edit', 'ProjectSubmissionController@edit')->name('project.public.edit');
    Route::post('project/submission/{project}', 'ProjectSubmissionController@update')->name('project.public.update');

    /*
     * Project Listing CRUD - must be signed-in
     */
    Route::get('project/create', 'ProjectPrivateController@create')->name('project.private.create');
    Route::post('project', 'ProjectPrivateController@store')->name('project.private.store');
    Route::get('project/{project}/edit', 'ProjectPrivateController@edit')->name('project.private.edit');
    Route::post('project/{project}', 'ProjectPrivateController@update')->name('project.private.update');

    /*
     * Project - Private/Manage - must be signed-in
     */
    Route::group(['prefix' => 'project/{project}'], function () {
        Route::get('manage', 'ProjectPrivateController@show')->name('project.private.show');
        Route::get('print', 'ProjectPrivateController@print')->name('project.private.print');

        /*
        * Project membership actions - must be signed-in
        */
        Route::post('follow', 'ProjectUserController@follow')->name('project.follow');
        Route::get('unfollow', 'ProjectUserController@unfollow')->name('project.unfollow');
        Route::post('unfollow', 'ProjectUserController@unfollow')->name('project.unfollow');
        Route::post('apply', 'ProjectUserController@apply')->name('project.apply');
        Route::post('cancel-application', 'ProjectUserController@cancelApplication')->name('project.cancelApplication');

        // Project Attachments
        Route::get('attachment', 'ProjectAttachmentController@add')->name('project.private.attachment.add');
        Route::post('attachment', 'ProjectAttachmentController@store')->name('project.private.attachment.store');

        Route::get('attachment/{media}/edit', 'ProjectAttachmentController@edit')->name('project.private.attachment.edit');
        Route::post('attachment/{media}', 'ProjectAttachmentController@update')->name('project.private.attachment.update');
        Route::get('attachment/{media}/delete', 'ProjectAttachmentController@delete')->name('project.private.attachment.delete');

        // Project Notes
        Route::get('note', 'ProjectNoteController@add')->name('project.private.note.add');
        Route::post('note', 'ProjectNoteController@store')->name('project.private.note.store');

        Route::get('note/{note}/edit', 'ProjectNoteController@edit')->name('project.private.note.edit');
        Route::post('note/{note}', 'ProjectNoteController@update')->name('project.private.note.update');
        Route::get('note/{note}/delete', 'ProjectNoteController@delete')->name('project.private.note.delete');

        // Project Users
        Route::get('user', 'ProjectUserController@add')->name('project.private.user.add');
        Route::post('user', 'ProjectUserController@store')->name('project.private.user.store');

        Route::get('user/{user}', 'ProjectUserController@show')->name('project.private.user.show');
        Route::get('user/{user}/edit', 'ProjectUserController@edit')->name('project.private.user.edit');
        Route::post('user/{user}', 'ProjectUserController@update')->name('project.private.user.update');
        Route::get('user/{user}/delete', 'ProjectUserController@delete')->name('project.private.user.delete');
    });

    /*
     * Internship Submission CRUD - must be signed-in
     */
    Route::get('internship/submission/create', 'InternshipSubmissionController@create')->name('internship.submission.create');
    Route::post('internship/submission', 'InternshipSubmissionController@store')->name('internship.submission.store');
    Route::get('internship/submission/{internship}/edit', 'InternshipSubmissionController@edit')->name('internship.submission.edit');
    Route::post('internship/submission/{internship}', 'InternshipSubmissionController@update')->name('internship.submission.update');

    /*
     * Internship Listing CRUD - must be signed-in
     */
    Route::get('internship/create', 'InternshipPrivateController@create')->name('internship.private.create');
    Route::post('internship', 'InternshipPrivateController@store')->name('internship.private.store');
    Route::get('internship/{internship}/edit', 'InternshipPrivateController@edit')->name('internship.private.edit');
    Route::post('internship/{internship}', 'InternshipPrivateController@update')->name('internship.private.update');

    /*
     * Internship - Private/Manage - must be signed-in
     */
    Route::group(['prefix' => 'internship/{internship}'], function () {
        Route::get('manage', 'InternshipPrivateController@show')->name('internship.private.show');
        Route::get('print', 'InternshipPrivateController@print')->name('internship.private.print');

        /*
        * Internship membership actions - must be signed-in
        */
        Route::post('follow', 'InternshipUserController@follow')->name('internship.follow');
        Route::get('unfollow', 'InternshipUserController@unfollow')->name('internship.unfollow');
        Route::post('unfollow', 'InternshipUserController@unfollow')->name('internship.unfollow');
        Route::post('apply', 'InternshipUserController@apply')->name('internship.apply');
        Route::post('cancel-application', 'InternshipUserController@cancelApplication')->name('internship.cancelApplication');

        // Internship Attachments
        Route::get('attachment', 'InternshipAttachmentController@add')->name('internship.private.attachment.add');
        Route::post('attachment', 'InternshipAttachmentController@store')->name('internship.private.attachment.store');

        Route::get('attachment/{media}/edit', 'InternshipAttachmentController@edit')->name('internship.private.attachment.edit');
        Route::post('attachment/{media}', 'InternshipAttachmentController@update')->name('internship.private.attachment.update');
        Route::get('attachment/{media}/delete', 'InternshipAttachmentController@delete')->name('internship.private.attachment.delete');

        // Internship Notes
        Route::get('note', 'InternshipNoteController@add')->name('internship.private.note.add');
        Route::post('note', 'InternshipNoteController@store')->name('internship.private.note.store');

        Route::get('note/{note}/edit', 'InternshipNoteController@edit')->name('internship.private.note.edit');
        Route::post('note/{note}', 'InternshipNoteController@update')->name('internship.private.note.update');
        Route::get('note/{note}/delete', 'InternshipNoteController@delete')->name('internship.private.note.delete');

        // Internship Users
        Route::get('user', 'InternshipUserController@add')->name('internship.private.user.add');
        Route::post('user', 'InternshipUserController@store')->name('internship.private.user.store');

        Route::get('user/{user}', 'InternshipUserController@show')->name('internship.private.user.show');
        Route::get('user/{user}/edit', 'InternshipUserController@edit')->name('internship.private.user.edit');
        Route::post('user/{user}', 'InternshipUserController@update')->name('internship.private.user.update');
        Route::get('user/{user}/delete', 'InternshipUserController@delete')->name('internship.private.user.delete');
    });
});

Route::group([
    'as' => 'opportunity.',
    'namespace' => 'Opportunity',
], function () {

    /*
     * Project frontend access
     */
    Route::get('project', 'ProjectPublicController@index_active')->name('project.public.active');
    Route::get('project/completed', 'ProjectPublicController@index_completed')->name('project.public.completed');
    Route::get('project/{project}', 'ProjectPublicController@show')->name('project.public.show');

    /*
     * Internship frontend access
     */
    Route::get('internship', 'InternshipPublicController@index')->name('internship.public.active');
    Route::get('internship/{internship}', 'InternshipPublicController@show')->name('internship.public.show');
});
