<?php

namespace SCCatalog\Models\Opportunity;

use SCCatalog\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravel\Scout\Searchable;
use SCCatalog\Models\Opportunity\Traits\Attribute\InternshipAttribute;
use SCCatalog\Models\Opportunity\Traits\Method\InternshipMethod;
use SCCatalog\Models\Opportunity\Traits\Relationship\InternshipRelationship;
use SCCatalog\Models\Opportunity\Traits\Scope\InternshipScope;

/**
 * Class Internship
 */
class Internship extends BaseModel implements HasMedia
{
    use HasMediaTrait,
        InternshipAttribute,
        InternshipMethod,
        InternshipRelationship,
        InternshipScope,
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
        'description',
        'supervisor_user_id',
        'submitting_user_id',
        'degree_program',
        'compensation',
        'responsibilities',
        'qualifications',
        'application_instructions',
        'program_lead',
        'success_story',
        'library_collection',
        'organization_id',
    ];

    /**
     * @return bool
     */
    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $internship = [];

        $internship['id'] = $this->id;
        $internship['active'] = $this->isActive();
        $internship['name'] = e($this->name);
        $internship['description'] = e($this->description);
        $internship['opportunityStartAt'] = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $internship['opportunityEndAt'] = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $internship['applicationDeadlineAt'] = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $internship['applicationDeadlineText'] = e($this->application_deadline_text);
        $internship['listingStartAt'] = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $internship['listingEndAt'] = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $internship['followerCount'] = $this->follower_count;
        $internship['status'] = e($this->status->name);
        $internship['organizationName'] = e($this->organization->name) ?? '';

        // Index Location Cities
        $internship['locations'] = '';
        foreach ($this->addresses as $address) {
            $internship['locations'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $internship['affiliations'] = $this->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $internship['accessAffiliations'] = $this->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        // Index AffiliationIcons
        $internship['affiliationIcons'] = $this->affiliations->map(function ($data) {
            return [
                'slug' => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon' => json_decode($data['backend_fa_icon']),
                'help_text' => $data['help_text'],
            ];
        })->toArray();

        // Index Categories names
        $internship['categories'] = $this->categories->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index Keywords names
        $internship['keywords'] = $this->keywords->map(function ($data) {
            return e($data['name']);
        })->toArray();

        return $internship;
    }
}
