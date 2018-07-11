<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AddressValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class AddressValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'state'   => 'required',
            'country' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'state'   => 'required',
            'country' => 'required',
        ],
    ];
}
