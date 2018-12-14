<?php

namespace SCCatalog\Http\Requests\Frontend\Opportunity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateProjectRequest.
 */
class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && $this->user()->can('submit project proposal');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	//
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'needs_review'                => 'nullable|boolean',
            'name'                        => 'string|max:1024',
            'opportunity_start_at'        => 'nullable|date',
            'opportunity_end_at'          => 'nullable|date',
            // 'listing_start_at'            => 'nullable|date',
            // 'listing_end_at'              => 'nullable|date',
            // 'application_deadline_at'     => 'nullable|date',
            // 'application_deadline_text'   => 'nullable|string',
            // 'opportunity_status_id'       => 'nullable|integer|exists:opportunity_statuses,id',
            // 'review_status_id'            => 'nullable|integer|exists:opportunity_review_statuses,id',
            'description'                 => 'nullable',
            // 'parent_opportunity_id'    => 'integer',
            // 'supervisor_user_id'          => 'nullable|integer|exists:users,id',
            // 'submitting_user_id'          => 'nullable|integer|exists:users,id',
            // 'degree_program'              => 'nullable|string',
            'compensation'                => 'nullable',
            'responsibilities'            => 'nullable',
            // 'learning_outcomes'           => 'nullable',
            'sustainability_contribution' => 'nullable',
            'qualifications'              => 'nullable',
            'application_instructions'    => 'nullable',
            'implementation_paths'        => 'nullable',
            // 'budget_type_id'              => 'nullable|integer|exists:budget_types,id',
            // 'budget_amount'               => 'nullable|string',
            // 'program_lead'                => 'nullable|string',
            // 'success_story'               => 'nullable|url',
            // 'library_collection'          => 'nullable|url',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
