<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\Affiliation;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AffiliationRepository
 */
class AffiliationRepository extends BaseRepository
{
    /**
     * AffiliationRepository constructor.
     *
     * @param  Affiliation  $model
     */
    public function __construct(Affiliation $model)
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
     * @return Affiliation
     */
    public function create(array $data) : Affiliation
    {
        return DB::transaction(function () use ($data) {
            $affiliation = $this->model::create($data);

            if ($affiliation) {
                // event(new AffiliationCreated($affiliation));

                return $affiliation;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Affiliation  $affiliation
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Affiliation
     */
    public function update(Affiliation $affiliation, array $data) : Affiliation
    {
        return DB::transaction(function () use ($affiliation, $data) {
            if ($affiliation->update($data)) {
                // event(new AffiliationUpdated($affiliation));

                return $affiliation;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
