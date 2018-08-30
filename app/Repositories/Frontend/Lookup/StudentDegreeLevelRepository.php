<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\StudentDegreeLevel;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class StudentDegreeLevelRepository
 */
class StudentDegreeLevelRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return StudentDegreeLevel::class;
    }
}
