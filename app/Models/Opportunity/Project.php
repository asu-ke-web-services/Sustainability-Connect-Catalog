<?php

namespace SCCatalog\Models\Opportunity;

use SCCatalog\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
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
        Searchable,
        ProjectAttribute,
        ProjectMethod,
        ProjectRelationship,
        ProjectScope;

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

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    public function toSearchableArray()
    {
        $project = [];

        $project['id'] = $this->id;
        $project['active'] = $this->isActive();
        // $project['completed']               = $this->isCompleted();
        $project['name'] = e($this->name);
        $project['description'] = e($this->description);
        $project['opportunityStartAt'] = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $project['opportunityEndAt'] = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $project['applicationDeadlineAt'] = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $project['applicationDeadlineText'] = e($this->application_deadline_text);
        $project['listingStartAt'] = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $project['listingEndAt'] = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $project['followerCount'] = $this->follower_count;
        $project['status'] = null !== $this->status ? e($this->status->name) : null;
        $project['reviewStatus'] = null !== $this->reviewStatus ? e($this->reviewStatus->name) : null;
        $project['organizationName'] = null !== $this->organization ? e($this->organization->name) : null;

        // Index Location Cities
        $project['locations'] = '';
        foreach ($this->addresses as $address) {
            $project['locations'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $project['affiliations'] = $this->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $project['accessAffiliations'] = $this->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        // Index AffiliationIcons
        $project['affiliationIcons'] = $this->affiliations->map(function ($data) {
            return [
                'slug' => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon' => json_decode($data['backend_fa_icon']),
                'help_text' => $data['help_text'],
            ];
        })->toArray();

        // Index Categories names
        $project['categories'] = $this->categories->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index Keywords names
        $project['keywords'] = $this->keywords->map(function ($data) {
            return e($data['name']);
        })->toArray();

        return $project;
    }
}
