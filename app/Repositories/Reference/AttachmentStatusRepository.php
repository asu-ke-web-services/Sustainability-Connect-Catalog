<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\AttachmentStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentStatusRepository
 */
class AttachmentStatusRepository extends BaseRepository
{
    /**
     * AttachmentStatusRepository constructor.
     *
     * @param  AttachmentStatus  $model
     */
    public function __construct(AttachmentStatus $model)
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
     * @return AttachmentStatus
     */
    public function create(array $data) : AttachmentStatus
    {
        return DB::transaction(function () use ($data) {
            $attachmentStatus = $this->model::create($data);

            if ($attachmentStatus) {
                // event(new AttachmentStatusCreated($attachmentStatus));

                return $attachmentStatus;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param AttachmentStatus  $attachmentStatus
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return AttachmentStatus
     */
    public function update(AttachmentStatus $attachmentStatus, array $data) : AttachmentStatus
    {
        return DB::transaction(function () use ($attachmentStatus, $data) {
            if ($attachmentStatus->update($data)) {
                // event(new AttachmentStatusUpdated($attachmentStatus));

                return $attachmentStatus;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
