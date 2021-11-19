<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
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
    public function store(TwoFactorRequest $request)
    {
        abort_unless(JetAdminLte::hasTwoFactorFeature(), 500);

        $user = User::find($request->user);

        $service = new TwoFactorService($user);

        if ($service->verifyKey($request->one_time_password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        Auth::logout();
    }
}
