<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Attachment;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentRepository
 */
class AttachmentRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }
}
