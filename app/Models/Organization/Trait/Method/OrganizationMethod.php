<?php

namespace SCCatalog\Models\Organization\Traits\Method;

/**
 * Trait OrganizationMethod.
 */
trait OrganizationMethod
{
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
