<?php

namespace SCCatalog\Models\Opportunity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
// use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Opportunity
 */
class Opportunity extends Model
{
    use BlameableTrait;
    use HasMediaTrait;
    // use RevisionableTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'application_deadline',
        'listing_start_date',
        'listing_end_date',
        'start_date',
        'end_date',
    ];

    public $fillable = [
        'name',
        'public_name',
        'start_date',
        'end_date',
        'listing_start_date',
        'listing_end_date',
        'application_deadline',
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
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class, 'organization_id')->withDefault();
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
    public function users()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [2,3,4,5]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user', 'opportunity_id', 'user_id')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 3);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function mentors()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'opportunity_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [4,5]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function addresses()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address\Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function notes()
    {
        return $this->belongsToMany(\SCCatalog\Models\Note\Note::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     * @param $type
     * @return mixed
     */
    public function scopeFilterByType($query, $type)
    {
        return $query->where('opportunityable_type', $type);
    }

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
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
        } else {
            // Closed or archived
            return $query->whereIn('opportunity_status_id', [
                2, // Archived/Closed
                7, // Completed
            ]);
        }
    }

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
