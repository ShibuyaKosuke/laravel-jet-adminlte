<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Google2FA;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorUnRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Services\TwoFactorService;

class TwoFactorAuthenticationController extends Controller
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private mixed $columnName;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->columnName = config('google2fa.otp_secret_column');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        $user = $request->user();
        $qrCodeUrl = ($user->getAttribute($this->columnName)) ? (new TwoFactorService($user))->getQrCode() : null;

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
        Google2FA::login();

        event(new TwoFactorRegisterEvent($request));

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
        Google2FA::logout();

        event(new TwoFactorUnRegisterEvent($request));

        return redirect()->route('two-factor-auth');
    }
}
