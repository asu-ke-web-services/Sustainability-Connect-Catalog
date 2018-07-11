<?php

namespace SCCatalog\Contracts\Models;

use SCCatalog\Models\Address;

/**
 * Interface HasAddress
 *
 * @package    SCCatalog\Contracts\Model
 * @subpackage SCCatalog\Contracts\Model\HasAddress
 */
interface HasAddress
{
    /**
     * @return Address
     */
    public function getAddress();

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function setAddress(Address $address);
}
