<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Project;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
