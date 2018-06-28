<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Internship;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InternshipRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:49 pm UTC
 *
 * @method Internship findWithoutFail($id, $columns = ['*'])
 * @method Internship find($id, $columns = ['*'])
 * @method Internship first($columns = ['*'])
*/
class InternshipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compensation',
        'responsibilities',
        'qualifications',
        'application_instructions',
        'comments',
        'program_lead',
        'success_story',
        'library_collection',
        'publish_on',
        'publish_until'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Internship::class;
    }
}
