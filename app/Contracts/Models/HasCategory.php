<?php

namespace SCCatalog\Contracts\Models;

use SCCatalog\Models\Category;

/**
 * Interface HasCategory
 *
 * @package    SCCatalog\Contracts\Model
 * @subpackage SCCatalog\Contracts\Model\HasCategory
 */
interface HasCategory
{
    /**
     * @return Category
     */
    public function getCategory();

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category);
}
