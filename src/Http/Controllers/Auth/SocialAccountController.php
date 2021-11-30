<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use ShibuyaKosuke\LaravelJetAdminlte\Services\SocialAccountsService as SocialService;

class SocialAccountController extends Controller
{
    /**
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param Request $request
     * @param SocialService $service
     * @param string $provider
     * @return RedirectResponse
     */
    public function handleProviderCallback(Request $request, SocialService $service, string $provider): RedirectResponse
    {
        try {
            $snsUser = Socialite::with($provider)->user();

            if ($request->user()) {
                $authUser = $service->attachSocialAccount($request, $snsUser, $provider);

                return redirect()
                    ->route('social-accounts')
                    ->with('success_message', trans('jet-adminlte::adminlte.success_connected_message'));
            }

            /** @var Authenticatable $authUser */
            $authUser = $service->findOrCreate($request, $snsUser, $provider);
            Auth::login($authUser, true);

            return redirect()->route('dashboard');
        } catch (Exception $e) {
            $route = ($request->user()) ? 'social-accounts' : 'login';
            return redirect()->route($route)
                ->with('failure_message', trans('jet-adminlte::adminlte.failure_connected_message'));
        }
    }

    /**
     * @param Request $request
     * @param SocialService $service
     * @param string $provider
     * @return RedirectResponse
     */
    public function detachSocialAccount(Request $request, SocialService $service, string $provider): RedirectResponse
    {
        $service->detachSocialAccount($request->user(), $provider);

        return redirect()
            ->back()
            ->with('success_message', trans('jet-adminlte::adminlte.success_disconnected_message'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function social(Request $request): View
    {
        $user = $request->user();
        return view('jet-adminlte::social-accounts.index', compact('user'));
    }
}
