<?php

namespace SCCatalog\Contracts\Model;


/**
 * Interface IsUniversallyIdentifiable
 *
 * @package    SCCatalog\Contracts\Model
 * @subpackage SCCatalog\Contracts\Model\IsUniversallyIdentifiable
 */
interface IsUniversallyIdentifiable
{
    /**
     * @return string
     */
    public function getUuid() : string;
}
