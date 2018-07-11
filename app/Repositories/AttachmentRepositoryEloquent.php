<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SCCatalog\Contracts\Repositories\AttachmentRepositoryContract;
use SCCatalog\Models\Attachment;
use SCCatalog\Validators\AttachmentValidator;

/**
 * Class AttachmentRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method Attachment findWithoutFail($id, $columns = ['*'])
 * @method Attachment find($id, $columns = ['*'])
 * @method Attachment first($columns = ['*'])
*/
class AttachmentRepositoryEloquent extends BaseRepository implements AttachmentRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AttachmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
