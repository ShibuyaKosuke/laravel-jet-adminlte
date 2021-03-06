<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Requests;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Models\LinkedSocialAccount;

class AccountRequest extends FormRequest
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
        /** @var Collection|LinkedSocialAccount[] $socialAccounts */
        $socialAccounts = $this->user()->linkedSocialAccounts ?? collect();
        $emailRule = JetAdminLte::hasSocialLoginFeature() && $socialAccounts->isNotEmpty() ? 'nullable' : 'required';

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [$emailRule, 'string', 'email', 'max:255'],
        ];
    }
}
