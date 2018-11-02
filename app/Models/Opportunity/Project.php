<?php

namespace SCCatalog\Models\Opportunity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
// use Venturecraft\Revisionable\RevisionableTrait;
//
/**
 * Class Project
 */
class Project extends Model
{
    // use RevisionableTrait;
    use Searchable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $timestamps = false;

    public $fillable = [
        'review_status_id',
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
        'library_collection'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * All relationships to be touched on model update (touch updated_at).
     *
     * @var array
     */
    protected $touches = [
        'opportunity'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     **/
    public function opportunity()
    {
        return $this->morphOne(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunityable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function budgetType()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\BudgetType::class, 'budget_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reviewStatus()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityReviewStatus::class, 'review_status_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeInReview($query)
    {
        return $query->where('review_status_id', 3);
    }

    /**
     * @param $query
     * @param bool $approved
     *
     * @return mixed
     */
    public function scopeApproved($query, $approved = true)
    {
        if ($approved) {
            return $query->where('review_status_id', 1);
        } else {
            // Closed or archived or otherwise not approved
            return $query->whereIn('review_status_id', [
                2, // Archived
                4, // Hidden
                5, // Draft
                6, // Trash
            ]);
        }
    }

    /**
     * @param $query
     * @param bool $approved
     *
     * @return mixed
     */
    public function scopeNeedsReview($query, $review)
    {
        if ($review) {
            return $query->where('needs_review', 1);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.show', $this->opportunity).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.edit', $this->opportunity).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.destroy', $this->opportunity).'"
             data-method="delete"
             data-trans-button-cancel="'.__('buttons.general.cancel').'"
             data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
             data-trans-title="'.__('strings.backend.general.are_you_sure').'"
             class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
              '.$this->show_button.'
              '.$this->edit_button.'
              '.$this->delete_button.'
            </div>';
    }

    /**
     * Get the value used to index the model.
     *
     * @return mixed
     */
    public function getScoutKey()
    {
        return $this->opportunity->id;
    }

    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    public function isPublished()
    {
        if (
            $this->is_hidden === 1 ||
            $this->review_status_id === 1 ||
            \in_array($this->opportunity->status->slug, [
                'idea-submission',
                'closed',
            ], true) ||
            (
                $this->opportunity->listing_start_at !== null &&
                Carbon::parse($this->opportunity->listing_start_at)->greaterThan(Carbon::today())
            ) ||
            (
                $this->opportunity->listing_end_at !== null &&
                Carbon::parse($this->opportunity->listing_end_at)->lessThan(Carbon::today())
            )
        ) {
            return false;
        }

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }


    public function toSearchableArray()
    {
        $project = array();

        $project['id']                  = $this->opportunity->id;
        $project['type']                = 'Project';
        $project['name']                = e($this->opportunity->name);
        $project['publicName']          = e($this->opportunity->public_name);
        $project['description']         = e($this->opportunity->description);
        $project['opportunityStartAt']    = $this->opportunity->opportunity_start_at;
        $project['opportunityEndAt']      = $this->opportunity->opportunity_end_at;
        $project['applicationDeadlineAt'] = e($this->opportunity->application_deadline_at);
        $project['applicationDeadlineText'] = e($this->opportunity->application_deadline_text);
        $project['listingStartAt']        = $this->opportunity->listing_start_at;
        $project['listingEndAt']          = $this->opportunity->listing_end_at;
        $project['followerCount']       = $this->opportunity->follower_count;
        $project['status']              = e($this->opportunity->status->name);
        $project['reviewStatus']        = e($this->reviewStatus->name);
        $project['organizationName']    = e($this->opportunity->organization->name) ?? '';

        // Index Location Cities
        $project['locations'] = '';
        foreach ($this->opportunity->addresses as $address) {
            $project['locations'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $project['affiliations'] = $this->opportunity->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $project['accessAffiliations'] = $this->opportunity->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        // Index AffiliationIcons
        $project['affiliationIcons'] = $this->opportunity->affiliations->map(function ($data) {
            return [
                'slug'             => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon'  => json_decode($data['backend_fa_icon']),
                'help_text'        => $data['help_text'],
            ];
        })->toArray();

        // Index Categories names
        $project['categories'] = $this->opportunity->categories->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index Keywords names
        $project['keywords'] = $this->opportunity->keywords->map(function ($data) {
            return e($data['name']);
        })->toArray();

        return $project;
    }
}
