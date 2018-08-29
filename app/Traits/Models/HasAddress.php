<?php

namespace SCCatalog\Support\Traits\Models;

use SCCatalog\Models\Address;

/**
 * Class HasAddress
 *
 * @package    SCCatalog\Support\Traits\Models
 * @subpackage SCCatalog\Support\Traits\Models\HasAddress
 */
trait HasAddress
{

    /**
     * @var Address
     */
    protected $address;

    /**
     * @return Address
     */
    public function getAddress() : Address
    {
        if (!$this->address) {
            $this->address = new Address();
        }

        return $this->address;
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }
}
