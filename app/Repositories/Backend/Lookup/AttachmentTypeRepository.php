<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentTypeRepository
 */
class AttachmentTypeRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttachmentType::class;
    }
}
