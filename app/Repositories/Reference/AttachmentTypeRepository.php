<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\AttachmentType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentTypeRepository
 */
class AttachmentTypeRepository extends BaseRepository
{
    /**
     * AttachmentTypeRepository constructor.
     *
     * @param  AttachmentType  $model
     */
    public function __construct(AttachmentType $model)
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
     * @return AttachmentType
     */
    public function create(array $data) : AttachmentType
    {
        return DB::transaction(function () use ($data) {
            $attachmentType = $this->model::create($data);

            if ($attachmentType) {
                // event(new AttachmentTypeCreated($attachmentType));

                return $attachmentType;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param AttachmentType  $attachmentType
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return AttachmentType
     */
    public function update(AttachmentType $attachmentType, array $data) : AttachmentType
    {
        return DB::transaction(function () use ($attachmentType, $data) {
            if ($attachmentType->update($data)) {
                // event(new AttachmentTypeUpdated($attachmentType));

                return $attachmentType;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
