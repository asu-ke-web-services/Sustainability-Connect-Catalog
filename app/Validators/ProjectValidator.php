<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProjectValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class ProjectValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            // 'name'                        => 'required',
            // 'public_name'                 => 'required',
            // 'slug'                        => 'required',
            // 'listing_expires'             => 'nullable|date',
            // 'application_deadline'        => 'nullable',
            // 'opportunity_status_id'       => 'nullable|integer',
            // 'is_hidden'                   => 'boolean',
            // 'summary'                     => 'required',
            // 'description'                 => 'required',
            // 'parent_opportunity_id'       => 'nullable|integer',
            // 'organization_id'             => 'nullable|integer',
            // 'supervisor_user_id'          => 'nullable|integer',
            // 'submitting_user_id'          => 'nullable|integer',
            // 'compensation'                => 'nullable',
            // 'responsibilities'            => 'nullable',
            // 'learning_outcomes'           => 'nullable',
            // 'sustainability_contribution' => 'nullable',
            // 'qualifications'              => 'nullable',
            // 'application_instructions'    => 'nullable',
            // 'implementation_paths'        => 'nullable',
            // 'budget_type'                 => 'nullable',
            // 'budget_amount'               => 'nullable',
            // 'program_lead'                => 'nullable',
            // 'success_story'               => 'nullable|active_url',
            // 'library_collection'          => 'nullable|active_url',
        ],
        ValidatorInterface::RULE_UPDATE => [
            // 'name'                        => 'required',
            // 'public_name'                 => 'required',
            // 'slug'                        => 'required',
            // 'listing_expires'             => 'nullable|date',
            // 'application_deadline'        => 'nullable',
            // 'opportunity_status_id'       => 'nullable|integer',
            // 'is_hidden'                   => 'boolean',
            // 'summary'                     => 'required',
            // 'description'                 => 'required',
            // 'parent_opportunity_id'       => 'nullable|integer',
            // 'organization_id'             => 'nullable|integer',
            // 'supervisor_user_id'          => 'nullable|integer',
            // 'submitting_user_id'          => 'nullable|integer',
            // 'compensation'                => 'nullable',
            // 'responsibilities'            => 'nullable',
            // 'learning_outcomes'           => 'nullable',
            // 'sustainability_contribution' => 'nullable',
            // 'qualifications'              => 'nullable',
            // 'application_instructions'    => 'nullable',
            // 'implementation_paths'        => 'nullable',
            // 'budget_type'                 => 'nullable',
            // 'budget_amount'               => 'nullable',
            // 'program_lead'                => 'nullable',
            // 'success_story'               => 'nullable|active_url',
            // 'library_collection'          => 'nullable|active_url',
        ],
    ];
}
