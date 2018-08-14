<?php

namespace SCCatalog\Models;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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
    use FormAccessible;
    use HasSlug;
    use Searchable;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $table = 'opportunities';

    protected $dates = [
        'application_deadline',
        'deleted_at',
        'end_date',
        'listing_end_date',
        'listing_start_date',
        'start_date',
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
        'start_date'           => 'date',
        'end_date'             => 'date',
        'listing_end_date'     => 'date',
        'listing_start_date'   => 'date',
        'application_deadline' => 'date',
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

    // public static function boot()
    // {
    //     static::saved(function ($model) {
    //         $model->opportunityable->filter(function ($item) {
    //             return $item->shouldBeSearchable();
    //         })->searchable();
    //     });
    // }

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
        return $this->belongsTo(\SCCatalog\Models\Opportunity::class, 'parent_opportunity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\SCCatalog\Models\Organization::class, 'organization_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supervisorUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'supervisor_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'submitting_user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\SCCatalog\Models\Category::class, 'category_opportunity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function keywords()
    {
        return $this->belongsToMany(\SCCatalog\Models\Keyword::class, 'keyword_opportunity');
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
     * Get the opportunity's listing start date
     *
     * @param  string  $value
     * @return string
     */
    public function getListingStartsAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the opportunity's listing start date for Forms
     *
     * @param  string  $value
     * @return string
     */
    public function formListingStartsAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Set the opportunity's listing start date
     *
     * @param  string  $value
     * @return string
     */
    public function setListingStartsAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Get the opportunity's listing end date
     *
     * @param  string  $value
     * @return string
     */
    public function getListingEndsAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the opportunity's listing end date for Forms
     *
     * @param  string  $value
     * @return string
     */
    public function formListingEndsAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Set the opportunity's listing end date
     *
     * @param  string  $value
     * @return string
     */
    public function setListingEndsAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Get the opportunity's start date
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the opportunity's start date for Forms
     *
     * @param  string  $value
     * @return string
     */
    public function formStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Set the opportunity's start date
     *
     * @param  string  $value
     * @return string
     */
    public function setStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Get the opportunity's end date
     *
     * @param  string  $value
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the opportunity's end date for Forms
     *
     * @param  string  $value
     * @return string
     */
    public function formEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Set the opportunity's end date
     *
     * @param  string  $value
     * @return string
     */
    public function setEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Get the opportunity's application deadline date
     *
     * @param  string  $value
     * @return string
     */
    public function getApplicationDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the opportunity's application deadline date for Forms
     *
     * @param  string  $value
     * @return string
     */
    public function formApplicationDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Set the opportunity's application deadline date
     *
     * @param  string  $value
     * @return string
     */
    public function setApplicationDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */


    public function toSearchableArray()
    {
        $opportunity = $this->toArray();

        $opportunity['type']              = $this->opportunityable_type;
        $opportunity['status']            = $this->status->name;
        $opportunity['organizationName']  = $this->organization->name;
        $opportunity['parentOpportunity'] = $this->parentOpportunity;
        $opportunity['supervisorUser']    = $this->supervisorUser;
        $opportunity['submittingUser']    = $this->submittingUser;

        $opportunity['opportunityable']   = $this->opportunityable;

        // Index Addresses
        $opportunity['addresses'] = $this->addresses->map(function ($data) {
                            return $data['city'] .
                                    ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                                    ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        // Index Categories names
        $opportunity['categories'] = $this->categories->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // Index Keywords names
        $opportunity['keywords'] = $this->keywords->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // // Index Notes body content
        // $opportunity['notes'] = $this->notes->map(function ($data) {
        //                                 return $data['body'];
        // })->toArray();

        return $opportunity;
    }
}
