<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use ShibuyaKosuke\LaravelJetAdminlte\Services\SocialAccountsService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialAccountController extends Controller
{
    /**
     * @param string $provider
     * @return RedirectResponse|null
     */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param Request $request
     * @param SocialAccountsService $accountService
     * @param string $provider
     * @return RedirectResponse
     */
    public function handleProviderCallback(Request $request, SocialAccountsService $accountService, string $provider): RedirectResponse
    {
        try {
            $snsUser = Socialite::with($provider)->user();

            if ($request->user()) {
                $authUser = $accountService->attachSocialAccount($request->user(), $snsUser, $provider);
                return redirect()->route('account.index')
                    ->with('success_message', trans('jet-adminlte::adminlte.success_connected_message'));
            }

            $authUser = $accountService->findOrCreate($snsUser, $provider);
            Auth::login($authUser, true);
            return redirect()->route('dashboard');

        } catch (Exception $e) {
            $route = ($request->user()) ? 'account.index' : 'login';
            return redirect()->route($route)
                ->with('failure_message', trans('jet-adminlte::adminlte.failure_connected_message'));
        }
    }

    /**
     * @param Request $request
     * @param SocialAccountsService $accountService
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detachSocialAccount(Request $request, SocialAccountsService $accountService, string $provider): \Illuminate\Http\RedirectResponse
    {
        $accountService->detachSocialAccount($request->user(), $provider);
        return redirect()->route('account.index')
            ->with('success_message', trans('jet-adminlte::adminlte.success_disconnected_message'));
    }
}
