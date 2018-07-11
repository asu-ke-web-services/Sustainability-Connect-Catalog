<?php

namespace SCCatalog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SCCatalog\Models\Organization;

class OrganizationUpdateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Organization::$rules;
    }
}
