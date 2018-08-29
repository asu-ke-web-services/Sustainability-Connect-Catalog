<?php

namespace SCCatalog\Support\Traits\Models;

use SCCatalog\Models\Keyword;

/**
 * Class HasKeyword
 *
 * @package    SCCatalog\Support\Traits\Models
 * @subpackage SCCatalog\Support\Traits\Models\HasKeyword
 */
trait HasKeyword
{

    /**
     * @var Keyword
     */
    protected $keyword;

    /**
     * @return Keyword
     */
    public function getKeyword() : Keyword
    {
        if (!$this->keyword) {
            $this->keyword = new Keyword();
        }

        return $this->keyword;
    }

    /**
     * @param Keyword $keyword
     *
     * @return $this
     */
    public function setKeyword(Keyword $keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }
}
