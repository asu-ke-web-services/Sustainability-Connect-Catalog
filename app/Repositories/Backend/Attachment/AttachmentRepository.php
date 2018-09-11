<?php

namespace SCCatalog\Repositories\Backend\Attachment;

use SCCatalog\Models\Attachment\Attachment;
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
