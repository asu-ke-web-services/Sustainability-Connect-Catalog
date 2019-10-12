<?php

/**
 * All route names are prefixed with 'admin.reference'.
 */
Route::group([
    'prefix' => 'reference',
    'as' => 'reference.',
    'namespace' => 'Reference',
//    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    /*
     * Affiliation CRUD
     */
    Route::resource('affiliation', 'AffiliationController');

    /* AttachmentType CRUD */
    Route::resource('attachment-type', 'AttachmentTypeController', [
        'names' => [
            'index' => 'attachment_type.index',
            'create' => 'attachment_type.create',
            'store' => 'attachment_type.store',
            'show' => 'attachment_type.show',
            'edit' => 'attachment_type.edit',
            'update' => 'attachment_type.update',
            'destroy' => 'attachment_type.destroy',
        ],
    ]);

    /* BudgetType CRUD */
    Route::resource('budget-type', 'BudgetTypeController', [
        'names' => [
            'index' => 'budget_type.index',
            'create' => 'budget_type.create',
            'store' => 'budget_type.store',
            'show' => 'budget_type.show',
            'edit' => 'budget_type.edit',
            'update' => 'budget_type.update',
            'destroy' => 'budget_type.destroy',
        ],
    ]);

    /* Category CRUD */
    Route::resource('category', 'CategoryController');

    /* Keyword CRUD */
    Route::resource('keyword', 'KeywordController');

    /* OpportunityReviewStatus CRUD */
    Route::resource('opportunity-review-status', 'OpportunityReviewStatusController', [
        'names' => [
            'index' => 'opportunity_review_status.index',
            'create' => 'opportunity_review_status.create',
            'store' => 'opportunity_review_status.store',
            'show' => 'opportunity_review_status.show',
            'edit' => 'opportunity_review_status.edit',
            'update' => 'opportunity_review_status.update',
            'destroy' => 'opportunity_review_status.destroy',
        ],
    ]);

    /* OpportunityStatus CRUD */
    Route::resource('opportunity-status', 'OpportunityStatusController', [
        'names' => [
            'index' => 'opportunity_status.index',
            'create' => 'opportunity_status.create',
            'store' => 'opportunity_status.store',
            'show' => 'opportunity_status.show',
            'edit' => 'opportunity_status.edit',
            'update' => 'opportunity_status.update',
            'destroy' => 'opportunity_status.destroy',
        ],
    ]);

    /* OpportunityType CRUD */
    Route::resource('opportunity-type', 'OpportunityTypeController', [
        'names' => [
            'index' => 'opportunity_type.index',
            'create' => 'opportunity_type.create',
            'store' => 'opportunity_type.store',
            'show' => 'opportunity_type.show',
            'edit' => 'opportunity_type.edit',
            'update' => 'opportunity_type.update',
            'destroy' => 'opportunity_type.destroy',
        ],
    ]);

    /* OrganizationStatus CRUD */
    Route::resource('organization-status', 'OrganizationStatusController', [
        'names' => [
            'index' => 'organization_status.index',
            'create' => 'organization_status.create',
            'store' => 'organization_status.store',
            'show' => 'organization_status.show',
            'edit' => 'organization_status.edit',
            'update' => 'organization_status.update',
            'destroy' => 'organization_status.destroy',
        ],
    ]);

    /* OrganizationType CRUD */
    Route::resource('organization-type', 'OrganizationTypeController', [
        'names' => [
            'index' => 'organization_type.index',
            'create' => 'organization_type.create',
            'store' => 'organization_type.store',
            'show' => 'organization_type.show',
            'edit' => 'organization_type.edit',
            'update' => 'organization_type.update',
            'destroy' => 'organization_type.destroy',
        ],
    ]);

    /* RelationshipType CRUD */
    Route::resource('relationship-type', 'RelationshipTypeController', [
        'names' => [
            'index' => 'relationship_type.index',
            'create' => 'relationship_type.create',
            'store' => 'relationship_type.store',
            'show' => 'relationship_type.show',
            'edit' => 'relationship_type.edit',
            'update' => 'relationship_type.update',
            'destroy' => 'relationship_type.destroy',
        ],
    ]);

    /* StudentDegreeLevel CRUD */
    Route::resource('student-degree-level', 'StudentDegreeLevelController', [
        'names' => [
            'index' => 'student_degree_level.index',
            'create' => 'student_degree_level.create',
            'store' => 'student_degree_level.store',
            'show' => 'student_degree_level.show',
            'edit' => 'student_degree_level.edit',
            'update' => 'student_degree_level.update',
            'destroy' => 'student_degree_level.destroy',
        ],
    ]);

    /* UserType CRUD */
    Route::resource('user-type', 'UserTypeController', [
        'names' => [
            'index' => 'user_type.index',
            'create' => 'user_type.create',
            'store' => 'user_type.store',
            'show' => 'user_type.show',
            'edit' => 'user_type.edit',
            'update' => 'user_type.update',
            'destroy' => 'user_type.destroy',
        ],
    ]);
});
