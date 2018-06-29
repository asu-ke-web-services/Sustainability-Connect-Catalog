<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityStatusRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OpportunityStatus findWithoutFail($id, $columns = ['*'])
 * @method OpportunityStatus find($id, $columns = ['*'])
 * @method OpportunityStatus first($columns = ['*'])
*/
class OpportunityStatusRepository extends BaseRepository implements AddressRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order',
        'name',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OpportunityStatus::class;
    }
}
