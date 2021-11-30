<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountDetachedEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\LoginListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountDetachedListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountRegisterListener;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\TwoFactorAuthListener;

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
        TwoFactorAuthEvent::class => [
            TwoFactorAuthListener::class
        ],
        SocialAccountRegisterEvent::class => [
            SocialAccountRegisterListener::class
        ],
        SocialAccountDetachedEvent::class => [
            SocialAccountDetachedListener::class
        ],
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
