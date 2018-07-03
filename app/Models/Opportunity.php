<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
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
 * @property boolean hidden
 * @property string summary
 * @property string description
 * @property integer parent_opportunity_id
 * @property integer organization_id
 * @property integer owner_user_id
 * @property integer submitting_user_id
 */
class Opportunity extends Model implements Transformable
{
    use BlameableTrait;
    use HasSlug;
    use SoftDeletes;
    use TransformableTrait;

    public $table = 'opportunities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'alt_title',
        'slug',
        'listing_expires',
        'application_deadline',
        'opportunity_status_id',
        'hidden',
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
        'id'                    => 'integer',
        'opportunityable_id'    => 'integer',
        'opportunityable_type'  => 'string',
        'title'                 => 'string',
        'alt_title'             => 'string',
        'slug'                  => 'string',
        'listing_expires'       => 'date',
        'application_deadline'  => 'string',
        'opportunity_status_id' => 'integer',
        'hidden'                => 'boolean',
        'summary'               => 'string',
        'description'           => 'string',
        'parent_opportunity_id' => 'integer',
        'organization_id'       => 'integer',
        'owner_user_id'         => 'integer',
        'submitting_user_id'    => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function addresses()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address::class, 'opportunities_addresses');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\SCCatalog\Models\Category::class, 'opportunities_categories');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function keywords()
    {
        return $this->belongsToMany(\SCCatalog\Models\Keyword::class, 'opportunities_keywords');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function notes()
    {
        return $this->belongsToMany(\SCCatalog\Models\Note::class, 'opportunities_notes');
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
}
