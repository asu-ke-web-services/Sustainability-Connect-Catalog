<?php

/**
 * All route names are prefixed with 'admin.lookup'.
 */
Route::group([
    'prefix'     => 'lookup',
    'as'         => 'lookup.',
    'namespace'  => 'Lookup',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Affiliation CRUD
     */
    Route::resource('affiliation', 'AffiliationController');

    /* BudgetType CRUD */
    Route::resource('budgettype', 'BudgetTypeController');

    /* Category CRUD */
    Route::resource('category', 'CategoryController');

    /* Keyword CRUD */
    Route::resource('keyword', 'KeywordController');

    /* OpportunityReviewStatus CRUD */
    Route::resource('opportunityreviewstatus', 'OpportunityReviewStatusController');

    /* OpportunityStatus CRUD */
    Route::resource('opportunitystatus', 'OpportunityStatusController');

    /* OpportunityType CRUD */
    Route::resource('opportunitytype', 'OpportunityTypeController');

    /* OrganizationStatus CRUD */
    Route::resource('organizationstatus', 'OrganizationStatusController');

    /* OrganizationType CRUD */
    Route::resource('organizationtype', 'OrganizationTypeController');

    /* RelationshipType CRUD */
    Route::resource('relationshiptype', 'RelationshipTypeController');

    /* StudentDegreeLevel CRUD */
    Route::resource('studentdegreelevel', 'StudentDegreeLevelController');

});
