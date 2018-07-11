<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class KeywordValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class KeywordValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'parent_id' => 'nullable|integer',
            'order'     => 'integer',
            'name'      => 'required',
            'slug'      => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'parent_id' => 'nullable|integer',
            'order'     => 'integer',
            'name'      => 'required',
            'slug'      => 'required',
        ],
    ];
}
