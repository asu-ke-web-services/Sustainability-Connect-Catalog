<?php

namespace SCCatalog\Http\Requests\Frontend\Opportunity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreFullProjectRequest.
 */
class StoreFullProjectRequest extends FormRequest
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
            'name' => 'required|max:1024',
            'description' => 'required',
            'opportunity_status_id' => 'required',
            'opportunity_start_at' => 'required',
            'opportunity_end_at' => 'required',
            'implementation_paths' => 'required',
            'sustainability_contribution' => 'required',
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
            'name.required' => 'Please enter the project Name',
            'name.maxlength' => 'The project name may not be longer than 1024 characters',
            'description.required' => 'Please enter the project description',
            'opportunity_status_id.required' => 'Please select the project status',
            'opportunity_start_at.required' => 'Please enter the Project Start Date',
            'opportunity_end_at.required' => 'Please enter the Project End Date',
            'implementation_paths.required' => 'Please enter the project solution',
            'sustainability_contribution.required' => 'Please enter the project deliverables',
        ];
    }
}
