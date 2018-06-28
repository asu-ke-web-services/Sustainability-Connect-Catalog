<?php

namespace SCCatalog\Support\Contracts\Entity;


interface UniversallyIdentifiable
{
    /**
     * @return string
     */
    public function getUuid() : string;
}
