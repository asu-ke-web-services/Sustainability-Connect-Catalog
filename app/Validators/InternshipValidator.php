<?php

namespace SCCatalog\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class InternshipValidator.
 *
 * @package namespace SCCatalog\Validators;
 */
class InternshipValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title'                    => 'required',
            'alt_title'                => 'required',
            'slug'                     => 'required',
            'listing_expires'          => 'nullable|date',
            'application_deadline'     => 'nullable',
            'opportunity_status_id'    => 'nullable|integer',
            'hidden'                   => 'boolean',
            'summary'                  => 'required',
            'description'              => 'required',
            'parent_opportunity_id'    => 'nullable|integer',
            'organization_id'          => 'nullable|integer',
            'owner_user_id'            => 'nullable|integer',
            'submitting_user_id'       => 'nullable|integer',
            'compensation'             => 'nullable',
            'responsibilities'         => 'nullable',
            'qualifications'           => 'nullable',
            'application_instructions' => 'nullable',
            'comments'                 => 'nullable',
            'program_lead'             => 'nullable',
            'success_story'            => 'nullable|active_url',
            'library_collection'       => 'nullable|active_url',
            'publish_on'               => 'nullable|date',
            'publish_until'            => 'nullable|date',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title'                    => 'required',
            'alt_title'                => 'required',
            'slug'                     => 'required',
            'listing_expires'          => 'nullable|date',
            'application_deadline'     => 'nullable',
            'opportunity_status_id'    => 'nullable|integer',
            'hidden'                   => 'boolean',
            'summary'                  => 'required',
            'description'              => 'required',
            'parent_opportunity_id'    => 'nullable|integer',
            'organization_id'          => 'nullable|integer',
            'owner_user_id'            => 'nullable|integer',
            'submitting_user_id'       => 'nullable|integer',
            'compensation'             => 'nullable',
            'responsibilities'         => 'nullable',
            'qualifications'           => 'nullable',
            'application_instructions' => 'nullable',
            'comments'                 => 'nullable',
            'program_lead'             => 'nullable',
            'success_story'            => 'nullable|active_url',
            'library_collection'       => 'nullable|active_url',
            'publish_on'               => 'nullable|date',
            'publish_until'            => 'nullable|date',
        ],
    ];
}
