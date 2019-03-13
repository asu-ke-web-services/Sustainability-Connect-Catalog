<?php

namespace SCCatalog\Http\Requests\Backend\Opportunity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreInternshipRequest.
 */
class StoreInternshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store internship');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                        => 'required|max:1024',
            'opportunity_status_id'       => 'required',
            'description'                 => 'required',
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
            'name.required'                        => 'Please enter the Internship Name',
            'opportunity_status_id.required'       => 'Please select the Internship Status',
            'description.required'                 => 'Please enter the Internship Description',
        ];
    }
}
