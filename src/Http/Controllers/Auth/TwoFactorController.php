<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use PragmaRX\Google2FALaravel\Facade as Google2fa;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Requests\Auth\TwoFactorRequest;
use ShibuyaKosuke\LaravelJetAdminlte\Services\TwoFactorService;

class TwoFactorController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $user = $request->session()->get('user');
        return view('jet-adminlte::auth.two-factor-login', compact('user'));
    }

    /**
     * @param TwoFactorRequest $request
     * @return RedirectResponse
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function store(TwoFactorRequest $request): RedirectResponse
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        $user = $request->user();

        if ((new TwoFactorService($user))->verifyKey($request->one_time_password)) {
            Google2fa::login();
            event(new TwoFactorAuthEvent($request));
        }
        return redirect()->back();
    }
}
