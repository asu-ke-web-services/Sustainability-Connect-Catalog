<?php

/**
 * All route names are prefixed with 'admin.opportunity'.
 */
Route::group([
    'prefix' => 'opportunity',
    'as' => 'opportunity.',
    'namespace' => 'Opportunity',
    //    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Project Status'
     */
    Route::get('project/active', 'ProjectStatusController@getActive')->name('project.active');
    Route::get('project/archived', 'ProjectStatusController@getArchived')->name('project.archived');
    Route::get('project/completed', 'ProjectStatusController@getCompleted')->name('project.completed');
    Route::get('project/deleted', 'ProjectStatusController@getDeleted')->name('project.deleted');
    Route::get('project/expired', 'ProjectStatusController@getExpired')->name('project.expired');
    Route::get('project/invalid_open', 'ProjectStatusController@getInvalidOpen')->name('project.invalid_open');
    Route::get('project/future', 'ProjectStatusController@getFuture')->name('project.future');
    Route::get('project/import-review', 'ProjectStatusController@getImportReview')->name('project.import_review');
    Route::get('project/reviews', 'ProjectStatusController@getProposalReviews')->name('project.reviews');

    /* Project CRUD */
    Route::resource('project', 'ProjectController');

    /*
     * Specific Project
     */
    Route::group(['prefix' => 'project/{project}'], function () {
        Route::get('print', 'ProjectController@print')->name('project.print');
        Route::get('clone', 'ProjectController@clone')->name('project.clone');

        // Deleted
        Route::get('delete', 'ProjectStatusController@delete')->name('project.delete-permanently');
        Route::get('restore', 'ProjectStatusController@restore')->name('project.restore');

        // Project Attachments
        Route::get('attachment', 'ProjectAttachmentController@add')->name('project.attachment.add');
        Route::post('attachment', 'ProjectAttachmentController@store')->name('project.attachment.store');

        Route::get('attachment/{media}', 'ProjectAttachmentController@edit')->name('project.attachment.edit');
        Route::post('attachment/{media}', 'ProjectAttachmentController@update')->name('project.attachment.update');
        Route::get('attachment/{media}/delete', 'ProjectAttachmentController@delete')->name('project.attachment.delete');

        // Project Notes
        Route::get('note', 'ProjectNoteController@add')->name('project.note.add');
        Route::post('note', 'ProjectNoteController@store')->name('project.note.store');

        Route::get('note/{note}/edit', 'ProjectNoteController@edit')->name('project.note.edit');
        Route::post('note/{note}', 'ProjectNoteController@update')->name('project.note.update');
        Route::get('note/{note}/delete', 'ProjectNoteController@delete')->name('project.note.delete');

        // Project Users
        Route::get('user', 'ProjectUserController@add')->name('project.user.add');
        Route::post('user', 'ProjectUserController@store')->name('project.user.store');

        Route::get('user/{user}', 'ProjectUserController@show')->name('project.user.show');
        Route::get('user/{user}/edit', 'ProjectUserController@edit')->name('project.user.edit');
        Route::post('user/{user}', 'ProjectAUserController@update')->name('project.user.update');
        Route::get('user/{user}/delete', 'ProjectUserController@delete')->name('project.user.delete');
    });

    /*
     * Internship Status'
     */
    Route::get('internship/active', 'InternshipStatusController@getActive')->name('internship.active');
    Route::get('internship/inactive', 'InternshipStatusController@getInactive')->name('internship.inactive');
    Route::get('internship/deleted', 'InternshipStatusController@getDeleted')->name('internship.deleted');
    Route::get('internship/import-review', 'InternshipStatusController@getImportReview')->name('internship.import_review');

    /* Internship CRUD */
    Route::resource('internship', 'InternshipController');

    /*
     * Specific Internship
     */
    Route::group(['prefix' => 'internship/{internship}'], function () {
        Route::get('print', 'InternshipController@print')->name('internship.print');
        Route::get('clone', 'InternshipController@clone')->name('internship.clone');

        // Deleted
        Route::get('delete', 'InternshipStatusController@delete')->name('internship.delete-permanently');
        Route::get('restore', 'InternshipStatusController@restore')->name('internship.restore');

        // Internship Attachments
        Route::get('attachment', 'InternshipAttachmentController@add')->name('internship.attachment.add');
        Route::post('attachment', 'InternshipAttachmentController@store')->name('internship.attachment.store');

        Route::get('attachment/{media}/edit', 'InternshipAttachmentController@edit')->name('internship.attachment.edit');
        Route::post('attachment/{media}', 'InternshipAttachmentController@update')->name('internship.attachment.update');
        Route::get('attachment/{media}/delete', 'InternshipAttachmentController@delete')->name('internship.attachment.delete');

        // Internship Notes
        Route::get('note', 'InternshipNoteController@add')->name('internship.note.add');
        Route::post('note', 'InternshipNoteController@store')->name('internship.note.store');

        Route::get('note/{note}/edit', 'InternshipNoteController@edit')->name('internship.note.edit');
        Route::post('note/{note}', 'InternshipNoteController@update')->name('internship.note.update');
        Route::get('note/{note}/delete', 'InternshipNoteController@delete')->name('internship.note.delete');

        // Internship Users
        Route::get('user', 'InternshipUserController@add')->name('internship.user.add');
        Route::post('user', 'InternshipUserController@store')->name('internship.user.store');

        Route::get('user/{user}', 'InternshipUserController@show')->name('internship.user.show');
        Route::get('user/{user}/edit', 'InternshipUserController@edit')->name('internship.user.edit');
        Route::post('user/{user}', 'InternshipUserController@update')->name('internship.user.update');
        Route::get('user/{user}/delete', 'InternshipUserController@delete')->name('internship.user.delete');
    });
});
