<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\StudentDegreeLevel;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class StudentDegreeLevelRepository
 */
class StudentDegreeLevelRepository extends BaseRepository
{
    /**
     * StudentDegreeLevelRepository constructor.
     *
     * @param  StudentDegreeLevel  $model
     */
    public function __construct(StudentDegreeLevel $model)
    {
        $this->model = $model;
    }

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'order', 'direction' => 'asc'],
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return StudentDegreeLevel
     */
    public function create(array $data) : StudentDegreeLevel
    {
        return DB::transaction(function () use ($data) {
            $level = $this->model::create($data);

            if ($level) {
                // event(new StudentDegreeLevelCreated($level));

                return $level;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param StudentDegreeLevel  $level
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return StudentDegreeLevel
     */
    public function update(StudentDegreeLevel $level, array $data) : StudentDegreeLevel
    {
        return DB::transaction(function () use ($level, $data) {
            if ($level->update($data)) {
                // event(new StudentDegreeLevelUpdated($level));

                return $level;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
