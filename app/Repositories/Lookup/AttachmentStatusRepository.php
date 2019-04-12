<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentStatusRepository
 */
class AttachmentStatusRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttachmentStatus::class;
    }
}
