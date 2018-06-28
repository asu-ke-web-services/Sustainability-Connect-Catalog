<?php

namespace SCCatalog\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Opportunity
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection OpportunitiesAddress
 * @property \Illuminate\Database\Eloquent\Collection OpportunitiesCategory
 * @property \Illuminate\Database\Eloquent\Collection OpportunitiesKeyword
 * @property \Illuminate\Database\Eloquent\Collection OpportunitiesNote
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
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
class Opportunity extends Model
{
    use SoftDeletes;

    public $table = 'opportunities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'opportunityable_id',
        'opportunityable_type',
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
        'id' => 'integer',
        'opportunityable_id' => 'integer',
        'opportunityable_type' => 'string',
        'title' => 'string',
        'alt_title' => 'string',
        'slug' => 'string',
        'listing_expires' => 'date',
        'application_deadline' => 'string',
        'opportunity_status_id' => 'integer',
        'hidden' => 'boolean',
        'summary' => 'string',
        'description' => 'string',
        'parent_opportunity_id' => 'integer',
        'organization_id' => 'integer',
        'owner_user_id' => 'integer',
        'submitting_user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function opportunitiesAddresses()
    {
        return $this->hasMany(\SCCatalog\Models\OpportunitiesAddress::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function opportunitiesCategories()
    {
        return $this->hasMany(\SCCatalog\Models\OpportunitiesCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function opportunitiesKeywords()
    {
        return $this->hasMany(\SCCatalog\Models\OpportunitiesKeyword::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function opportunitiesNotes()
    {
        return $this->hasMany(\SCCatalog\Models\OpportunitiesNote::class);
    }
}
