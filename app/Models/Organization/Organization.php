<?php

namespace SCCatalog\Models\Organization;

use SCCatalog\Models\BaseModel;
use Laravel\Scout\Searchable;
use SCCatalog\Models\Organization\Traits\Attribute\OrganizationAttribute;
use SCCatalog\Models\Organization\Traits\Relationship\OrganizationRelationship;
use SCCatalog\Models\Organization\Traits\Scope\OrganizationScope;

/**
 * Class Organization
 */
class Organization extends BaseModel
{
    use OrganizationAttribute,
        OrganizationRelationship,
        OrganizationScope,
        Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'url',
        'organization_status_id',
        'organization_type_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|max:255',
        'url' => 'string|max:1024',
        'organization_status_id' => 'integer|exists:organization_statuses,id',
        'organization_type_id' => 'integer|exists:organization_types,id',
    ];

    public function shouldBeSearchable()
    {
        return true;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['type'] = $this->type->name;
        $array['status'] = $this->status->name;

        // Index Addresses
        $array['addresses'] = $this->addresses->map(function ($data) {
            return $data['city'] .
                (is_null($data['state']) ? '' : (', ' . $data['state'])) .
                (is_null($data['country']) ? '' : (', ' . $data['country']));
        })->toArray();

        return $array;
    }
}
