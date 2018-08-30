<?php

namespace SCCatalog\Models\Opportunity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Opportunity
 */
class Opportunity extends Model
{
    use BlameableTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $table = 'opportunities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'application_deadline',
        'listing_end_date',
        'listing_start_date',
        'start_date',
        'end_date',
    ];

    public $fillable = [
        'name',
        'public_name',
        'slug',
        'start_date',
        'end_date',
        'listing_start_date',
        'listing_end_date',
        'application_deadline',
        'application_deadline_text',
        'opportunity_status_id',
        'is_hidden',
        'summary',
        'description',
        'parent_opportunity_id',
        'organization_id',
        'supervisor_user_id',
        'submitting_user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date'           => 'date:Y-m-d',
        'end_date'             => 'date:Y-m-d',
        'listing_end_date'     => 'date:Y-m-d',
        'listing_start_date'   => 'date:Y-m-d',
        'application_deadline' => 'date:Y-m-d',
        'is_hidden'            => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

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
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     **/
    public function opportunityable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses()
    {
        return $this->morphMany(\SCCatalog\Models\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes()
    {
        return $this->morphMany(\SCCatalog\Models\Note::class, 'noteable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityStatus::class, 'opportunity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parentOpportunity()
    {
        return $this->belongsTo(\SCCatalog\Models\Opportunity\Opportunity::class, 'parent_opportunity_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\SCCatalog\Models\Organization::class, 'organization_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supervisorUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'supervisor_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'submitting_user_id')->withDefault();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function affiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliation_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function accessAffiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliation_opportunity')
            ->where('access_control', 1)
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Category::class, 'category_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function keywords()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Keyword::class, 'keyword_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function allRelatedUsers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user', 'opportunity_id', 'user_id')
            ->using('\SCCatalog\Models\OpportunityUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user', 'opportunity_id', 'user_id')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 3)
            ->wherePivot('pending', 0);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivotIn('relationship_type_id', [2,3,4,5])
            ->wherePivot('pending', 0);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    // public function primaryAddress()
    // {
    //     return $this->belongsToMany(\SCCatalog\Models\Address::class, 'address_opportunity')
    //         ->withPivot('is_primary', 'order')
    //         ->wherePivot('is_primary', 1);
    // }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the list of Opportunity Types.
     *
     * @return bool
     */
    public function getTypes()
    {
        \SCCatalog\Models\Lookup\OpportunityType::all();
    }

    /**
     * Get the list of Opportunity Statuses.
     *
     * @return bool
     */
    public function getStatuses()
    {
        \SCCatalog\Models\Lookup\OpportunityStatus::orderBy('order', 'asc')
            ->get();
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
            $this->status_id < 3
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

}
