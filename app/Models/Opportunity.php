<?php

namespace SCCatalog\Models;

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
 * @property integer opportunityable_id
 * @property string opportunityable_type
 * @property string title
 * @property string alt_title
 * @property string slug
 * @property date listing_expires
 * @property string application_deadline
 * @property integer opportunity_status_id
 * @property boolean is_hidden
 * @property string summary
 * @property string description
 * @property integer parent_opportunity_id
 * @property integer organization_id
 * @property integer owner_user_id
 * @property integer submitting_user_id
 */
class Opportunity extends Model
{
    use BlameableTrait;
    use HasSlug;
    use Searchable;
    use SoftDeletes;

    public $table = 'opportunities';

    protected $dates = [
        'application_deadline',
        'deleted_at',
        'end_date',
        'listing_ends',
        'listing_starts',
        'start_date',
    ];

    public $fillable = [
        'title',
        'alt_title',
        'slug',
        'start_date',
        'end_date',
        'listing_starts',
        'listing_ends',
        'application_deadline',
        'application_deadline_text',
        'opportunity_status_id',
        'is_hidden',
        'summary',
        'description',
        'parent_opportunity_id',
        'organization_id',
        'owner_user_id',
        'submitting_user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date'                => 'date',
        'end_date'                  => 'date',
        'listing_ends'              => 'date',
        'listing_starts'            => 'date',
        'application_deadline'      => 'date',
        'is_hidden'                 => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    // public static function boot()
    // {
    //     static::saved(function ($model) {
    //         $model->opportunityable->filter(function ($item) {
    //             return $item->shouldBeSearchable();
    //         })->searchable();
    //     });
    // }


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
    public function ownerUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'owner_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'submitting_user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function addresses()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address::class, 'address_opportunity')
            ->withPivot('primary', 'order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function primaryAddress()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address::class, 'address_opportunity')
            ->withPivot('primary', 'order')
            ->wherePivot('primary', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\SCCatalog\Models\Category::class, 'category_opportunity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function keywords()
    {
        return $this->belongsToMany(\SCCatalog\Models\Keyword::class, 'keyword_opportunity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function notes()
    {
        return $this->belongsToMany(\SCCatalog\Models\Note::class, 'note_opportunity');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function opportunityable()
    {
        return $this->morphTo();
    }

    public function toSearchableArray()
    {
        $opportunity = $this->toArray();

        $opportunity['type']              = $this->opportunityable_type;
        $opportunity['status']            = $this->status->name;
        $opportunity['organizationName']  = $this->organization->name;
        $opportunity['parentOpportunity'] = $this->parentOpportunity;
        $opportunity['ownerUser']         = $this->ownerUser;
        $opportunity['submittingUser']    = $this->submittingUser;

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

        // Index Notes body content
        $opportunity['notes'] = $this->notes->map(function ($data) {
                                        return $data['body'];
                                     })->toArray();

        return $opportunity;
    }
}
