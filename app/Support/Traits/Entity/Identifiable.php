<?php

namespace SCCatalog\Support\Traits\Entity;


trait Identifiable
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @return integer
     */

    public function getId() : int
    {
        return $this->id;
    }
}
