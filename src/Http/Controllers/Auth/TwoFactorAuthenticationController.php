<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Services\TwoFactorService;

class TwoFactorAuthenticationController
{
    /**
     * @param Request $request
     * @return View
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function index(Request $request): View
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        $user = $request->user();
        $qrCodeUrl = ($user->g2fa_key) ? (new TwoFactorService($user))->getQrCode() : null;

        return view('jet-adminlte::two-factor-auth.index', compact('qrCodeUrl'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function store(Request $request): RedirectResponse
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        (new TwoFactorService($request->user()))->setSecretKey();
        return redirect()->route('two-factor-auth');
    }
}