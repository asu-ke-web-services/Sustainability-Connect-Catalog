<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\OrganizationType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationTypeRepository
 */
class OrganizationTypeRepository extends BaseRepository
{
    /**
     * OrganizationTypeRepository constructor.
     *
     * @param  OrganizationType  $model
     */
    public function __construct(OrganizationType $model)
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
     * @return OrganizationType
     */
    public function create(array $data) : OrganizationType
    {
        return DB::transaction(function () use ($data) {
            $type = $this->model::create($data);

            if ($type) {
                // event(new OrganizationTypeCreated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param OrganizationType  $type
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return OrganizationType
     */
    public function update(OrganizationType $type, array $data) : OrganizationType
    {
        return DB::transaction(function () use ($type, $data) {
            if ($type->update($data)) {
                // event(new OrganizationTypeUpdated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
