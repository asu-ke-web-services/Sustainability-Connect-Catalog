<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\Opportunity;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method Opportunity findWithoutFail($id, $columns = ['*'])
 * @method Opportunity find($id, $columns = ['*'])
 * @method Opportunity first($columns = ['*'])
*/
class OpportunityRepository extends BaseRepository implements AddressRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'opportunityable_id',
        'opportunityable_type',
        'title',
        'alt_title',
        'slug',
        'listing_expires',
        'application_deadline',
        'opportunity_status_id',
        'hidden',
        'summary',
        'description',
        'parent_opportunity_id',
        'organization_id',
        'owner_user_id',
        'submitting_user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunity::class;
    }
}
