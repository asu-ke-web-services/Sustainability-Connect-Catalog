<?php

namespace SCCatalog\Support\Traits\Model;


trait IsIdentifiable
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
