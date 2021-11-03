<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use ShibuyaKosuke\LaravelJetAdminlte\Models\LinkedSocialAccount;

class SocialAccountsService
{
    /**
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return User
     */
    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {
        $account = LinkedSocialAccount::query()
            ->where([
                ['provider_name', '=', $provider],
                ['provider_id', '=', $providerUser->getId()]
            ])
            ->first();

        if ($account) {
            return $account->user;
        }

        /** @var User $user */
        $user = User::query()
            ->where('email', $providerUser->getEmail())
            ->firstOrCreate([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);

        $user->linkedSocialAccounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;
    }
}
