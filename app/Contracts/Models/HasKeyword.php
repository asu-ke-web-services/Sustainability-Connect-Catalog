<?php

namespace SCCatalog\Contracts\Models;

use SCCatalog\Models\Keyword;

/**
 * Interface HasKeyword
 *
 * @package    SCCatalog\Contracts\Model
 * @subpackage SCCatalog\Contracts\Model\HasKeyword
 */
interface HasKeyword
{
    /**
     * @return Keyword
     */
    public function getKeyword();

    /**
     * @param Keyword $keyword
     *
     * @return $this
     */
    public function setKeyword(Keyword $keyword);
}
