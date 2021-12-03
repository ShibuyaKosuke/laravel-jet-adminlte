<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\User as ProviderUser;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountDetachedEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Models\LinkedSocialAccount;

class SocialAccountsService
{
    /**
     * @param Request $request
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return User
     */
    public function findOrCreate(Request $request, ProviderUser $providerUser, string $provider): User
    {
        $linkedSocialAccount = LinkedSocialAccount::query()
            ->with(['user'])
            ->where([
                ['provider_name', '=', $provider],
                ['provider_id', '=', $providerUser->getId()]
            ])
            ->first();

        if ($linkedSocialAccount) {
            return $linkedSocialAccount->user;
        }

        /** @var User $user */
        $user = User::query()
            ->whereEmail($providerUser->getEmail())
            ->firstOrCreate([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName()
            ]);

        return $this->attachAccount($user, $providerUser, $provider);
    }

    /**
     * @param Request $request
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return User
     */
    public function attachSocialAccount(Request $request, ProviderUser $providerUser, string $provider): User
    {
        event(new SocialAccountRegisterEvent($request));
        return $this->attachAccount($request->user(), $providerUser, $provider);
    }

    /**
     * @param User $user
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return User
     */
    public function attachAccount(User $user, ProviderUser $providerUser, string $provider)
    {
        $user->linkedSocialAccounts()
            ->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar()
            ]);
        return $user;
    }

    /**
     * @param Request $request
     * @param string $provider
     * @return User
     */
    public function detachSocialAccount(Request $request, string $provider): User
    {
        $user = $request->user();
        LinkedSocialAccount::query()
            ->where([
                'provider_name' => $provider,
                'user_id' => $user->id,
            ])
            ->forceDelete();

        event(new SocialAccountDetachedEvent($request));
        return $user;
    }
}
