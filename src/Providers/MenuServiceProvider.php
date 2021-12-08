<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use Lavary\Menu\Menu;
use ShibuyaKosuke\LaravelJetAdminlte\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Menu\JetAdminLteMenu;

class MenuServiceProvider extends ServiceProviderBase
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Menu::class, function ($app) {
            return new JetAdminLteMenu($app);
        });
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            JetAdminLte::class,
        ];
    }
}
