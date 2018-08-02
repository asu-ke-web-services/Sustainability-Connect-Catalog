<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class OpportunityValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class OpportunityValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            // 'name'                     => 'required',
            // 'public_name'              => 'required',
            // 'slug'                     => 'required',
            // 'listing_expires'          => 'nullable|date',
            // 'application_deadline'     => 'nullable',
            // 'opportunity_status_id'    => 'nullable|integer',
            // 'is_hidden'                => 'boolean',
            // 'summary'                  => 'required',
            // 'description'              => 'required',
            // 'parent_opportunity_id'    => 'nullable|integer',
            // 'organization_id'          => 'nullable|integer',
            // 'supervisor_user_id'       => 'nullable|integer',
            // 'submitting_user_id'       => 'nullable|integer',
        ],
        ValidatorInterface::RULE_UPDATE => [
            // 'name'                     => 'required',
            // 'public_name'              => 'required',
            // 'slug'                     => 'required',
            // 'listing_expires'          => 'nullable|date',
            // 'application_deadline'     => 'nullable',
            // 'opportunity_status_id'    => 'nullable|integer',
            // 'is_hidden'                => 'boolean',
            // 'summary'                  => 'required',
            // 'description'              => 'required',
            // 'parent_opportunity_id'    => 'nullable|integer',
            // 'organization_id'          => 'nullable|integer',
            // 'supervisor_user_id'       => 'nullable|integer',
            // 'submitting_user_id'       => 'nullable|integer',
        ],
    ];
}
