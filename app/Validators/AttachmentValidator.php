<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AttachmentValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class AttachmentValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'opportunity_id'        => 'required',
            'user_id'        => 'required',
            'status'                  => 'nullable|integer',
            'comments'       => 'nullable|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'opportunity_id'        => 'required',
            'user_id'        => 'required',
            'status'                  => 'nullable|integer',
            'comments'       => 'nullable|string',
        ],
    ];
}
