<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use ShibuyaKosuke\LaravelJetAdminlte\Services\SocialAccountsService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

class SocialAccountController extends Controller
{
    /**
     * @param string $provider
     * @return RedirectResponse|null
     */
    public function redirectToProvider(string $provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (Throwable $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * @param SocialAccountsService $accountService
     * @param string $provider
     * @return RedirectResponse
     */
    public function handleProviderCallback(SocialAccountsService $accountService, string $provider): RedirectResponse
    {
        try {
            $user = Socialite::with($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }

        $authUser = $accountService->findOrCreate($user, $provider);

        Auth::login($authUser, true);

        return redirect()->route('dashboard');
    }
}
