<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Organization
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:29 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesAddresses
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesCategories
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesKeywords
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesNotes
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer organization_type_id
 * @property integer organization_status_id
 * @property string name
 */
class Organization extends Model
{
    use BlameableTrait;
    use Searchable;
    use SoftDeletes;

    public $table = 'organizations';

    public $fillable = [
        'organization_type_id',
        'organization_status_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'organization_type_id' => 'integer',
        'organization_status_id' => 'integer',
        'name' => 'string'
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
        return $this->belongsTo(\SCCatalog\Models\OrganizationStatus::class, 'organization_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\SCCatalog\Models\OrganizationType::class, 'organization_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function addresses()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address::class, 'address_organizations');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function notes()
    {
        return $this->belongsToMany(\SCCatalog\Models\Note::class, 'note_organizations');
    }


    public function toSearchableArray()
    {
        $organization = array();

        $organization['name'] = $this->name;
        $organization['type'] = $this->type->name;
        $organization['status'] = $this->status->name;

        // Index Addresses
        $organization['addresses'] = $this->addresses->map(function ($data) {
                                        return $data['city'] .
                                                ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                                                ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        // Index Notes body content
        $organization['notes'] = $this->notes->map(function ($data) {
                                        return $data['body'];
        })->toArray();

        return $organization;
    }
}
