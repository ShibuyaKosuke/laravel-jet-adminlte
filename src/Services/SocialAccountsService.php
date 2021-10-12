<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Services;

use App\Models\Account;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountsService
{
    /**
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return User
     */
    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {
        $account = Account::query()
            ->where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }

        /** @var User $user */
        $user = User::query()
            ->where('email', $providerUser->getEmail())
            ->first();

        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }

        $user->accounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;
    }
}
