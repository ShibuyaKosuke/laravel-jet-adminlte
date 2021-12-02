<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Rules;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Validation\Rule;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Services\TwoFactorService;

class TwoFactorVerify implements Rule
{
    /**
     * @var Authenticatable
     */
    private Authenticatable $user;

    /**
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return boolean
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function passes($attribute, $value): bool
    {
        if (!JetAdminLte::hasTwoFactorFeature()) {
            return true;
        }
        return (new TwoFactorService($this->user))->verifyKey($value);
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute is not correct.';
    }
}
