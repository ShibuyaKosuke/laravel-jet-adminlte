<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'current_password' => ['required', 'string', 'current_password', 'confirmed', Password::min(8)],
            'new_password' => ['required', 'string', Password::min(8)],
        ];
    }
}
