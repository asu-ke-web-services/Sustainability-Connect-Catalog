<?php

namespace SCCatalog\Models\Organization\Traits\Relationship;

/**
 * Trait OrganizationRelationship.
 */
trait OrganizationRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\OrganizationStatus::class, 'organization_status_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\OrganizationType::class, 'organization_type_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses()
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes()
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }
}
