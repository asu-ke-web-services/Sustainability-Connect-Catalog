<?php

namespace SCCatalog\Support\Traits\Entity;

use Ramsey\Uuid\Uuid as Uuid;

trait UniversallyIdentifiable {
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
