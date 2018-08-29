<?php

namespace SCCatalog\Support\Traits\Models;

use SCCatalog\Models\Category;

/**
 * Class HasCategory
 *
 * @package    SCCatalog\Support\Traits\Models
 * @subpackage SCCatalog\Support\Traits\Models\HasCategory
 */
trait HasCategory
{

    /**
     * @var Category
     */
    protected $category;

    /**
     * @return Category
     */
    public function getCategory() : Category
    {
        if (!$this->category) {
            $this->category = new Category();
        }

        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}
