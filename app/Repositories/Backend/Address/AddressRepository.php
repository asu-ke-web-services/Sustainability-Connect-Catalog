<?php

namespace SCCatalog\Repositories\Frontend;

use SCCatalog\Models\Address\Address;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AddressRepository
*/
class AddressRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Address::class;
    }
}
