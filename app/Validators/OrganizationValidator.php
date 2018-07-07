<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class OrganizationValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class OrganizationValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'                 => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'                 => 'required',
        ],
    ];
}
