<?php

namespace SCCatalog\Models\Organization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Organization
 */
class Organization extends Model
{
    use BlameableTrait;
    // use Searchable;
    use SoftDeletes;

    public $table = 'organizations';

    public $fillable = [
        'name',
        'organization_type_id',
        'organization_status_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];



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
        return $this->belongsTo(\SCCatalog\Models\OrganizationStatus::class, 'organization_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\SCCatalog\Models\OrganizationType::class, 'organization_type_id');
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

        // // Index Notes body content
        // $organization['notes'] = $this->notes->map(function ($data) {
        //                                 return $data['body'];
        // })->toArray();

        return $organization;
    }
}
