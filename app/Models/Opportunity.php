<?php

namespace SCCatalog\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Opportunity
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Address
 * @property \Illuminate\Database\Eloquent\Collection Category
 * @property \Illuminate\Database\Eloquent\Collection Keyword
 * @property \Illuminate\Database\Eloquent\Collection Note
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property \SCCatalog\Models\Opportunity parentOpportunity
 * @property \SCCatalog\Models\OpportunityStatus status
 * @property \SCCatalog\Models\Organization organization
 * @property \SCCatalog\Models\User supervisorUser
 * @property \SCCatalog\Models\User submittingUser
 * @property integer opportunityable_id
 * @property string opportunityable_type
 * @property string title
 * @property string alt_title
 * @property string slug
 * @property date listing_start_date
 * @property date listing_end_date
 * @property date start_date
 * @property date end_date
 * @property string application_deadline
 * @property boolean is_hidden
 * @property string summary
 * @property string description
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
        return $this->MorphMany(\SCCatalog\Models\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes()
    {
        return $this->MorphMany(\SCCatalog\Models\Note::class, 'noteable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\SCCatalog\Models\OpportunityStatus::class, 'opportunity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parentOpportunity()
    {
        return $this->belongsTo(\SCCatalog\Models\Opportunity::class, 'parent_opportunity_id')->withDefault();
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
        return $this->belongsTo(\SCCatalog\Models\User::class, 'supervisor_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'submitting_user_id')->withDefault();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function affiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Affiliation::class, 'affiliation_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function accessAffiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Affiliation::class, 'affiliation_opportunity')
            ->where('access_control', 1)
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\SCCatalog\Models\Category::class, 'category_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function keywords()
    {
        return $this->belongsToMany(\SCCatalog\Models\Keyword::class, 'keyword_opportunity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function allRelatedUsers()
    {
        return $this->belongsToMany(\SCCatalog\Models\User::class, 'opportunity_user', 'opportunity_id', 'user_id')
            ->using('\SCCatalog\Models\OpportunityUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers()
    {
        return $this->belongsToMany(\SCCatalog\Models\User::class, 'opportunity_user', 'opportunity_id', 'user_id')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants()
    {
        return $this->belongsToMany(\SCCatalog\Models\User::class, 'opportunity_user')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants()
    {
        return $this->belongsToMany(\SCCatalog\Models\User::class, 'opportunity_user')
            ->using('\SCCatalog\Models\OpportunityUser')
            ->wherePivot('relationship_type_id', 3)
            ->wherePivot('pending', 0);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers()
    {
        return $this->belongsToMany(\SCCatalog\Models\User::class, 'opportunity_user')
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
