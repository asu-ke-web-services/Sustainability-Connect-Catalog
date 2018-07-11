<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StudentDegreeLevelValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class StudentDegreeLevelValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'order'     => 'integer',
            'name'      => 'required',
            'slug'      => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'order'     => 'integer',
            'name'      => 'required',
            'slug'      => 'required',
        ],
    ];
}
