<?php

namespace SCCatalog\Models\Opportunity;

use SCCatalog\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravel\Scout\Searchable;
use SCCatalog\Models\Opportunity\Traits\Attribute\ProjectAttribute;
use SCCatalog\Models\Opportunity\Traits\Method\ProjectMethod;
use SCCatalog\Models\Opportunity\Traits\Relationship\ProjectRelationship;
use SCCatalog\Models\Opportunity\Traits\Scope\ProjectScope;

/**
 * Class Project
 */
class Project extends BaseModel implements HasMedia
{
    use HasMediaTrait,
        ProjectAttribute,
        ProjectMethod,
        ProjectRelationship,
        ProjectScope,
        Searchable;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'needs_review' => 'boolean',
        'opportunity_start_at' => 'date:Y-m-d',
        'opportunity_end_at' => 'date:Y-m-d',
        'listing_end_at' => 'date:Y-m-d',
        'listing_start_at' => 'date:Y-m-d',
        'application_deadline_at' => 'date:Y-m-d',
    ];

    /**
     * The attributes that should be mutated to dates (automatically cast to Carbon instances).
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'application_deadline_at',
        'listing_start_at',
        'listing_end_at',
        'opportunity_start_at',
        'opportunity_end_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'needs_review',
        'name',
        'opportunity_start_at',
        'opportunity_end_at',
        'listing_start_at',
        'listing_end_at',
        'application_deadline_at',
        'application_deadline_text',
        'opportunity_status_id',
        'review_status_id',
        'description',
        'supervisor_user_id',
        'submitting_user_id',
        'degree_program',
        'compensation',
        'responsibilities',
        'learning_outcomes',
        'sustainability_contribution',
        'qualifications',
        'application_instructions',
        'implementation_paths',
        'budget_type_id',
        'budget_amount',
        'program_lead',
        'success_story',
        'library_collection',
        'organization_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    // public $with = [
    //     'status',
    //     'reviewStatus',
    // ];
}
