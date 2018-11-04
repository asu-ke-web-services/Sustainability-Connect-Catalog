<?php

namespace SCCatalog\Http\Requests\Backend\Lookup;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OpportunityStatusRequest.
 */
class OpportunityStatusRequest extends FormRequest
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
        return [
            'opportunity_type_id' => 'nullable|integer|exists:opportunity_types,id',
            'order'               => 'nullable|integer',
            'name'                => ['required', 'string', 'max:250', Rule::unique('opportunity_statuses')],
            'slug'                => 'nullable|string|max:255',
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
            //
        ];
    }
}
