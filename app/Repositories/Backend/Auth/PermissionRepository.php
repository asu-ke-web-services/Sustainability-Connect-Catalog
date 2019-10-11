<?php

namespace SCCatalog\Repositories\Backend\Auth;

use SCCatalog\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * PermissionRepository constructor.
     *
     * @param  Permission  $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}
