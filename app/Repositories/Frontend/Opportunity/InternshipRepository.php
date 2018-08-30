<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Internship;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Internship::class;
    }
}
