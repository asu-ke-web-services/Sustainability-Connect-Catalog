<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\Keyword;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class KeywordRepository
 */
class KeywordRepository extends BaseRepository
{
    /**
     * KeywordRepository constructor.
     *
     * @param  Keyword  $model
     */
    public function __construct(Keyword $model)
    {
        $this->model = $model;
    }

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Keyword
     */
    public function create(array $data) : Keyword
    {
        return DB::transaction(function () use ($data) {
            $keyword = $this->model::create($data);

            if ($keyword) {
                // event(new KeywordCreated($keyword));

                return $keyword;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Keyword  $keyword
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Keyword
     */
    public function update(Keyword $keyword, array $data) : Keyword
    {
        return DB::transaction(function () use ($keyword, $data) {
            if ($keyword->update($data)) {
                // event(new KeywordUpdated($keyword));

                return $keyword;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
