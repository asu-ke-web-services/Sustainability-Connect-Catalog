<?php

namespace SCCatalog\Models\Opportunity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Internship
 */
class Internship extends Model implements HasMedia
{
    use BlameableTrait,
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
        'opportunity_start_at'    => 'date:Y-m-d',
        'opportunity_end_at'      => 'date:Y-m-d',
        'listing_end_at'          => 'date:Y-m-d',
        'listing_start_at'        => 'date:Y-m-d',
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
        // 'parent_opportunity_id',
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
    ];

    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTES
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.internship.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.internship.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.internship.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="'.__('buttons.general.cancel').'"
             data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
             data-trans-title="'.__('strings.backend.general.are_you_sure').'"
             class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.internship.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.opportunity.internship.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.internship.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fas fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.opportunity.internship.restore').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        // if ($this->trashed()) {
        //     return '
        //         <div class="btn-group" role="group" aria-label="Actions">
        //           '.$this->restore_button.'
        //           '.$this->delete_permanently_button.'
        //         </div>';
        // }
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
              '.$this->show_button.'
              '.$this->edit_button.'
              '.$this->delete_button.'
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
    public function isPublished()
    {
        return (
            $this->status->indicates_published &&
            $this->listing_start_at !== null &&
            $this->listing_start_at->lessThan(Carbon::today()) &&
            $this->listing_end_at !== null &&
            $this->listing_end_at->greaterThan(Carbon::today())
        );
    }

    /**
     * Get the active status of this model (required for consistency with Project in React SearchApp.)
     *
     * @return bool
     */
    public function isActive() : bool
    {
        return $this->isPublished();
    }

    /**
     * @return bool
     */
    public function shouldBeSearchable() : bool
    {
        return $this->isPublished();
    }

    /**
     * @return array
     */
    public function toSearchableArray() : array
    {
        $internship = array();

        $internship['id']                    = $this->id;
        $internship['active']                = $this->isActive();
        $internship['name']                  = e($this->name);
        $internship['description']           = e($this->description);
        $internship['opportunityStartAt']    = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $internship['opportunityEndAt']      = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $internship['applicationDeadlineAt'] = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $internship['applicationDeadlineText'] = e($this->application_deadline_text);
        $internship['listingStartAt']        = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $internship['listingEndAt']          = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $internship['followerCount']         = $this->follower_count;
        $internship['status']                = e($this->status->name);
        $internship['organizationName']      = e($this->organization->name) ?? '';

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
                'slug'             => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon'  => json_decode($data['backend_fa_icon']),
                'help_text'        => $data['help_text'],
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

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityStatus::class);
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
    public function organization() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supervisorUser() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'supervisor_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'submitting_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers() : BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [2,3,4,5]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers() : BelongsToMany {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants() : BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants() : BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 3);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function mentors() : BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [4,5]);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function affiliations() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function accessAffiliations() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable')
            ->where([
                ['access_control', 1],
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function categories() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Category::class, 'categorisable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function keywords() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Keyword::class, 'keywordable');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     * @param bool $active
     *
     * @return mixed
     */
    public function scopeActive($query, $active = true)
    {
        if ($active) {
            return $query->whereIn('opportunity_status_id', [
                9, // Active
            ]);
        } else {
            // Inacctive internships
            return $query->whereIn('opportunity_status_id', [
                8, // Inactive
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
