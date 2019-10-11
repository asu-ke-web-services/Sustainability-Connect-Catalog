<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\UserType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class UserTypeRepository
 */
class UserTypeRepository extends BaseRepository
{
    /**
     * UserTypeRepository constructor.
     *
     * @param  UserType  $model
     */
    public function __construct(UserType $model)
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
     * @return UserType
     */
    public function create(array $data) : UserType
    {
        return DB::transaction(function () use ($data) {
            $type = $this->model::create($data);

            if ($type) {
                // event(new UserTypeCreated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param UserType  $type
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return UserType
     */
    public function update(UserType $type, array $data) : UserType
    {
        return DB::transaction(function () use ($type, $data) {
            if ($type->update($data)) {
                // event(new UserTypeUpdated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
