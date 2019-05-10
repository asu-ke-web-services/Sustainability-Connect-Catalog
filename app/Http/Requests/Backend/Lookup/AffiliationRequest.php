<?php

namespace SCCatalog\Http\Requests\Backend\Lookup;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AffiliationRequest.
 */
class AffiliationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('manage lookup') || $this->user()->isAdmin();
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
            'order' => 'nullable|integer',
            'name' => ['required', 'string', 'max:250', Rule::unique('affiliations')],
            'slug' => 'nullable|string|max:255',
            'help_text' => 'nullable|string|max:255',
            'frontend_fa_icon' => 'nullable|string|max:255',
            'backend_fa_icon' => 'nullable|string|max:255',
            'access_control' => 'nullable|boolean',
            'public' => 'nullable|boolean',
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
