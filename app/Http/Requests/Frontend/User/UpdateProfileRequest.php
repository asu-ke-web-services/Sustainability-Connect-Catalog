<?php

namespace SCCatalog\Http\Requests\Frontend\User;

use Illuminate\Validation\Rule;
use SCCatalog\Helpers\Frontend\Auth\Socialite;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
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
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'email'           => 'sometimes|required|email|max:255',
            'avatar_type'     => ['required', 'max:255', Rule::in(array_merge(['gravatar', 'storage'], (new Socialite)->getAcceptedProviders()))],
            'avatar_location' => 'sometimes|image|max:255',
        ];
    }
}
