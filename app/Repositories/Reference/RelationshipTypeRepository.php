<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\RelationshipType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class RelationshipTypeRepository
 */
class RelationshipTypeRepository extends BaseRepository
{
    /**
     * RelationshipTypeRepository constructor.
     *
     * @param  RelationshipType  $model
     */
    public function __construct(RelationshipType $model)
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
     * @return RelationshipType
     */
    public function create(array $data) : RelationshipType
    {
        return DB::transaction(function () use ($data) {
            $type = $this->model::create($data);

            if ($type) {
                // event(new RelationshipTypeCreated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param RelationshipType  $type
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return RelationshipType
     */
    public function update(RelationshipType $type, array $data) : RelationshipType
    {
        return DB::transaction(function () use ($type, $data) {
            if ($type->update($data)) {
                // event(new RelationshipTypeUpdated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
