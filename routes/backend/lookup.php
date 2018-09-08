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
    Route::resource('budget_type', 'BudgetTypeController');

    /* Category CRUD */
    Route::resource('category', 'CategoryController');

    /* Keyword CRUD */
    Route::resource('keyword', 'KeywordController');

    /* OpportunityReviewStatus CRUD */
    Route::resource('opportunity_review_status', 'OpportunityReviewStatusController');

    /* OpportunityStatus CRUD */
    Route::resource('opportunity_status', 'ProjectStatusController');

    /* OpportunityType CRUD */
    Route::resource('opportunity_type', 'OpportunityTypeController');

    /* OrganizationStatus CRUD */
    Route::resource('organization_status', 'OrganizationStatusController');

    /* OrganizationType CRUD */
    Route::resource('organization_type', 'OrganizationTypeController');

    /* RelationshipType CRUD */
    Route::resource('relationship_type', 'RelationshipTypeController');

    /* StudentDegreeLevel CRUD */
    Route::resource('student_degree_level', 'StudentDegreeLevelController');

});
