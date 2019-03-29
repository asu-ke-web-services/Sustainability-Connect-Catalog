<?php

namespace SCCatalog\Http\Requests\Frontend\Opportunity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreInternshipSubmissionRequest.
 */
class StoreInternshipSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && $this->user()->can('store internship');
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
            'name.required'                        => 'Please enter the internship name',
            'opportunity_status_id.required'       => 'Please select the internship status',
            'description.required'                 => 'Please enter the internship description',
        ];
    }
}
