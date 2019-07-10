<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentTypeRepository
 */
class AttachmentTypeRepository extends BaseRepository
{
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttachmentType::class;
    }
}
