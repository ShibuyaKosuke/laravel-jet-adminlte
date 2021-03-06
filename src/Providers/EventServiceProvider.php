<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LogoutEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\PasswordChangeEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountDetachedEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountLoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorUnRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\LoginListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\LogoutListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\PasswordChangeListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountDetachedListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountLoginListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountRegisterListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\TwoFactorAuthListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\TwoFactorRegisterListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\TwoFactorUnRegisterListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        LoginEvent::class => [
            LoginListener::class
        ],
        LogoutEvent::class => [
            LogoutListener::class
        ],
        TwoFactorAuthEvent::class => [
            TwoFactorAuthListener::class
        ],
        TwoFactorRegisterEvent::class => [
            TwoFactorRegisterListener::class
        ],
        TwoFactorUnRegisterEvent::class => [
            TwoFactorUnRegisterListener::class
        ],
        SocialAccountRegisterEvent::class => [
            SocialAccountRegisterListener::class
        ],
        SocialAccountDetachedEvent::class => [
            SocialAccountDetachedListener::class
        ],
        SocialAccountLoginEvent::class => [
            SocialAccountLoginListener::class
        ],
        PasswordChangeEvent::class => [
            PasswordChangeListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
