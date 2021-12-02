<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use ShibuyaKosuke\LaravelJetAdminlte\Rules\TwoFactorVerify;

class TwoFactorRequest extends FormRequest
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
            'one_time_password' => ['required', 'integer', new TwoFactorVerify($this->user())],
        ];
    }
}
