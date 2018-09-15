<?php

namespace SCCatalog\Repositories\Frontend\Lookup;

use SCCatalog\Models\Lookup\StudentDegreeLevel;
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
