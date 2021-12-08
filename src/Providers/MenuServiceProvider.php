<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use ShibuyaKosuke\LaravelJetAdminlte\Menu\JetAdminLteMenu;

class MenuServiceProvider extends ServiceProviderBase
{
    /**
     * @return void
     */
    public function boot(): void
    {

    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(JetAdminLteMenu::class, function ($app) {
            return new JetAdminLteMenu($app);
        });
    }
}
