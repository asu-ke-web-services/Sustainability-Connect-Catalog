<?php

namespace SCCatalog\Http\Requests\Backend\Address;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageAddressRequest.
 */
class ManageAddressRequest extends FormRequest
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
            'primary'   => 'nullable|boolean',
            'street1'   => 'nullable|max:255',
            'street2'   => 'nullable|max:255',
            'city'      => 'nullable|max:255',
            'state'     => 'nullable|max:255',
            'post_code' => 'nullable|max:255',
            'country'   => 'nullable|max:255',
            'comment'   => 'nullable',
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
