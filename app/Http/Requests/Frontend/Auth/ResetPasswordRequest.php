<?php

namespace SCCatalog\Http\Requests\Frontend\Auth;

use SCCatalog\Rules\Auth\ChangePassword;
use SCCatalog\Rules\Auth\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use DivineOmega\LaravelPasswordExposedValidationRule\PasswordExposed;

/**
 * Class ResetPasswordRequest.
 */
class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password'     => [
                'required',
                'confirmed',
                new ChangePassword(),
                new PasswordExposed(),
                new UnusedPassword($this->get('token')),
            ],
        ];
    }
}
