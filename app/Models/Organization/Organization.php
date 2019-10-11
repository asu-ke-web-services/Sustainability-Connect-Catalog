<?php

namespace SCCatalog\Models\Organization;

use SCCatalog\Models\BaseModel;
use Laravel\Scout\Searchable;
use SCCatalog\Models\Opportunity\Traits\Attribute\OrganizationAttribute;
use SCCatalog\Models\Opportunity\Traits\Method\OrganizationMethod;
use SCCatalog\Models\Opportunity\Traits\Relationship\OrganizationRelationship;
use SCCatalog\Models\Opportunity\Traits\Scope\OrganizationScope;

/**
 * Class Organization
 */
class Organization extends BaseModel
{
    use Searchable,
        OrganizationAttribute,
        OrganizationMethod,
        OrganizationRelationship,
        OrganizationScope;

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
}
