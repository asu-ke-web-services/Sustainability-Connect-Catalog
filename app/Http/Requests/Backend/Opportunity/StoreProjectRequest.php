<?php

namespace SCCatalog\Http\Requests\Backend\Opportunity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreProjectRequest.
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
        return $this->user()->can('store project');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:1024',
            'opportunity_status_id' => 'required',
            'opportunity_start_at' => 'required',
            'opportunity_end_at' => 'required',
            'description' => 'required',
            'sustainability_contribution' => 'required',
            'implementation_paths' => 'required',
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
            //
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
            'name.required' => 'Please enter the Project Name',
            'opportunity_status_id.required' => 'Please select the Project Status',
            'opportunity_start_at.required' => 'Please enter the Project Start Date',
            'opportunity_end_at.required' => 'Please enter the Project End Date',
            'description.required' => 'Please enter the Project Description',
            'sustainability_contribution.required' => 'Please enter the Project Deliverables',
            'implementation_paths.required' => 'Please enter the Envisioned Solution',
        ];
    }
}
