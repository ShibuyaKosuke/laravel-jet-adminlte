<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Services\TwoFactorService;

class TwoFactorAuthenticationController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        $user = $request->user();
        $qrCodeUrl = ($user->google2fa_secret) ? (new TwoFactorService($user))->getQrCode() : null;

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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        (new TwoFactorService($request->user()))->deleteSecretKey();
        return redirect()->route('two-factor-auth');
    }
}
