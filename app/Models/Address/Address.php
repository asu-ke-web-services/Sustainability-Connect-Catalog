<?php

namespace SCCatalog\Models\Address;

use SCCatalog\Models\BaseModel;

/**
 * Class Address
 */
class Address extends BaseModel
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'primary' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'primary',
        'street1',
        'street2',
        'city',
        'state',
        'post_code',
        'country',
        'comment',
    ];

    /**
     * Get all owning addressable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     **/
    public function addressables()
    {
        return $this->morphTo();
    }
}
