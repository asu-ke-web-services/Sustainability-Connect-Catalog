<?php

namespace SCCatalog\Models\Opportunity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Project
 */
class Project extends Model implements HasMedia
{
    use
        BlameableTrait,
        HasMediaTrait,
        // RevisionableTrait,
        Searchable,
        SoftDeletes;
    // OpportunityAttribute,
    // OpportunityMethod,
    // OpportunityRelationship,
    // OpportunityScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'needs_review'            => 'boolean',
        // 'opportunity_start_at'    => 'date',
        // 'opportunity_end_at'      => 'date',
        // 'listing_end_at'          => 'date',
        // 'listing_start_at'        => 'date',
        // 'application_deadline_at' => 'date',
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

    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTES
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getShowButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.show', $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getCloneButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.clone', $this) . '" class="dropdown-item">' . __('buttons.general.crud.clone') . '</a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getPrintButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.print', $this) . '" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != auth()->id() && $this->id != 1) {
            return '<a href="' . route('admin.opportunity.project.destroy', $this) . '"
                data-method="delete"
                data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                data-trans-title="' . __('strings.backend.opportunity.projects.delete_project') . '"
                class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.delete-permanently', $this) . '" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.opportunity.project.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute(): string
    {
        return '<a href="' . route('admin.opportunity.project.restore', $this) . '" name="confirm_item" class="btn btn-info"><i class="fas fa-refresh" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.opportunity.project.restore') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute(): string
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group" role="group" aria-label="Actions">
                    ' . $this->restore_button . '
                    ' . $this->delete_permanently_button . '
                </div>';
        }
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->show_button . '
            ' . $this->edit_button . '

            <div class="btn-group btn-group-sm" role="group">
                <button id="projectActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ' . __('labels.general.more') . '
                </button>
                <div class="dropdown-menu" aria-labelledby="projectActions">
                    ' . $this->delete_button . '
                </div>
            </div>
            </div>';
    }

    /**
     * @return string
     */
    public function getFrontendShowButtonAttribute(): string
    {
        return '<a href="' . route('frontend.opportunity.project.public.show', $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendSubmissionEditButtonAttribute(): string
    {
        return '<a href="' . route('frontend.opportunity.project.public.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendFullEditButtonAttribute(): string
    {
        return '<a href="' . route('frontend.opportunity.project.private.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendPrintButtonAttribute(): string
    {
        return '<a href="' . route('frontend.opportunity.project.private.print', $this) . '" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendSubmissionActionButtonsAttribute(): string
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->frontend_show_button . '
            ' . $this->frontend_submission_edit_button . '
            </div>';
    }

    /**
     * @return string
     */
    public function getFrontendPrivateActionButtonsAttribute(): string
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->frontend_show_button . '
            ' . $this->frontend_full_edit_button . '
            </div>';
    }

    /*
    |--------------------------------------------------------------------------
    | METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    public function isPublished(): bool
    {
        return \in_array($this->opportunity_status_id, [
            3, // Seeking Champions
            4, // Recruiting Participants
            5, // Positions Filled
            6, // In Progress
            7, // Completed
        ], true);
    }

    /**
     * Should project be listed as active listing?.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return
            $this->listing_start_at !== null &&
            $this->listing_start_at->lessThan(Carbon::tomorrow()) &&
            $this->listing_end_at !== null &&
            $this->listing_end_at->greaterThan(Carbon::today()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as expired listing?.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        return
            $this->listing_end_at !== null &&
            $this->listing_end_at->greaterThan(Carbon::tomorrow()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Is project in Open status but without Listing Dates?
     *
     * @return bool
     */
    public function isInvalidOpen(): bool
    {
        return
            empty($this->listing_end_at) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as a Future listing?.
     *
     * @return bool
     */
    public function isFuture(): bool
    {
        return
            $this->listing_start_at !== null &&
            $this->listing_start_at->greaterThan(Carbon::tomorrow()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as a completed past project? Not exact inverse of isActive().
     *
     * @return bool
     */
    public function isCompleted(): bool
    {
        return 7 === $this->opportunity_status_id;

        // return (
        // $this->isPublished() &&
        // null !== $this->listing_start_at &&
        // null !== $this->listing_end_at &&
        // $this->listing_start_at->lessThan(Carbon::today()) &&
        // $this->listing_end_at->greaterThan(Carbon::today())
        // );
    }

    public function shouldBeSearchable(): bool
    {
        return $this->isPublished();
    }

    public function toSearchableArray(): array
    {
        $project = array();

        $project['id']                      = $this->id;
        $project['active']                  = $this->isActive();
        // $project['completed']               = $this->isCompleted();
        $project['name']                    = e($this->name);
        $project['description']             = e($this->description);
        $project['opportunityStartAt']      = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $project['opportunityEndAt']        = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $project['applicationDeadlineAt']   = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $project['applicationDeadlineText'] = e($this->application_deadline_text);
        $project['listingStartAt']          = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $project['listingEndAt']            = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $project['followerCount']           = $this->follower_count;
        $project['status']                  = null !== $this->status ? e($this->status->name) : null;
        $project['reviewStatus']            = null !== $this->reviewStatus ? e($this->reviewStatus->name) : null;
        $project['organizationName']        = null !== $this->organization ? e($this->organization->name) : null;

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
                'slug'             => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon'  => json_decode($data['backend_fa_icon']),
                'help_text'        => $data['help_text'],
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

    /*
    |--------------------------------------------------------------------------
    | PROJECT-UNIQUE RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function budgetType(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\BudgetType::class, 'budget_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reviewStatus(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityReviewStatus::class, 'review_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityStatus::class, 'opportunity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function parentOpportunity() : BelongsTo
    // {
    //     return $this->belongsTo(\SCCatalog\Models\Opportunity\Opportunity::class)->withDefault();
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class, 'organization_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supervisorUser(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'supervisor_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'submitting_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [2, 3, 4, 5]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 3);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function mentors(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'project_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [4, 5]);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses(): MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes(): MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function affiliations(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function accessAffiliations(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable')
            ->where([
                ['access_control', 1],
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function categories(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Category::class, 'categorisable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function keywords(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Keyword::class, 'keywordable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function updatedByUser(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'updated_by');
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
    public function scopeActive($query)
    {
        return $query->where([
            ['listing_start_at', '<>', null],
            ['listing_start_at', '<', Carbon::tomorrow()],
            ['listing_end_at', '<>', null],
            ['listing_end_at', '>', Carbon::today()],
        ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * Correctly published projects that have expired off the active listings
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeExpired($query)
    {
        return $query
            ->where([
                ['listing_end_at', '<>', null],
                ['listing_end_at', '<', Carbon::tomorrow()],
            ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * Open projects that were never updated with listing dates
     * @param $query
     *
     * @return mixed
     */
    public function scopeInvalidOpen($query)
    {
        return $query
            ->whereNull('listing_end_at')
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeFuture($query)
    {
        return $query->where([
            ['listing_start_at', '<>', null],
            ['listing_start_at', '>', Carbon::tomorrow()],
        ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeCompleted($query)
    {
        return $query->where('opportunity_status_id', 7);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeArchived($query)
    {
        return $query->whereIn('opportunity_status_id', [
            2, // Archived
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->whereIn('opportunity_status_id', [
            3, // Seeking Champion
            4, // Recruiting Participants
            5, // Positions Filled
            6, // In Progress
            7, // Completed
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeProposalNeedsReview($query)
    {
        return $query->where([
            ['opportunity_status_id', 1], // New Proposal
            ['review_status_id', 1] // Needs Review
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeInReview($query)
    {
        return $query->where([
            ['opportunity_status_id', 1], // New Proposal
            ['review_status_id', 2] // Review in Progress
        ]);
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
            return $query->where('review_status_id', 3);
        } else {
            // Closed or archived or otherwise not approved
            return $query->whereIn('review_status_id', [
                1, // Needs Review
                2, // Review In Progress
                4, // Not Approved
            ]);
        }
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNeedsImportReview($query)
    {
        return $query->where('needs_review', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
