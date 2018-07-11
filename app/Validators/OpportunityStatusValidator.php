<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class OpportunityStatusValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class OpportunityStatusValidator extends LaravelValidator
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
