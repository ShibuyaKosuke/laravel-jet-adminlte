<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use ShibuyaKosuke\LaravelJetAdminlte\Console\InstallCommand;
use ShibuyaKosuke\LaravelJetAdminlte\Console\MakeAdminlte;
use ShibuyaKosuke\LaravelJetAdminlte\JetAdminLte;

class ServiceProvider extends ServiceProviderBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        // migrations
        $this->registerMigrations();

        // view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'jet-adminlte');

        // lang
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'jet-adminlte');

        // Components
        $this->loadViewComponents();

        // publish config files
        $this->registerPublishes();

        // Command
        $this->registerCommand();

        // Breadcrumbs
        $this->setBreadcrumbs();
    }

    /**
     * @return void
     */
    protected function loadViewComponents(): void
    {
        //
    }

    /**
     * @return void
     */
    public function registerMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    /**
     * @return void
     */
    public function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/jet_adminlte.php' => config_path('jet_adminlte.php'),
            __DIR__ . '/../../config/jet_adminlte_menu.php' => config_path('jet_adminlte_menu.php'),
        ], 'jet-adminlte:config');

        $this->publishes([
            __DIR__ . '/../../resources/views/components' => resource_path('views/vendor/jet-adminlte/components'),
        ], 'jet-adminlte:components');

        $this->publishes([
            __DIR__ . '/../../resources/views/layouts' => resource_path('views/vendor/jet-adminlte/layouts'),
        ], 'jet-adminlte:layouts');

        $this->publishes([
            __DIR__ . '/../../resources/views/auth' => resource_path('views/vendor/jet-adminlte/auth'),
        ], 'jet-adminlte:auth');

        $this->publishes([
            __DIR__ . '/../../resources/js' => resource_path('js'),
            __DIR__ . '/../../resources/css' => resource_path('css'),
        ], 'jet-adminlte:assets');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang'),
        ], 'jet-adminlte:translation');
    }

    /**
     * @return void
     */
    public function registerCommand(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }
        $this->commands([
            MakeAdminlte::class,
            InstallCommand::class,
        ]);
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/jet_adminlte.php',
            'jet_adminlte'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/jet_adminlte_menu.php',
            'jet_adminlte_menu'
        );

        $this->app->singleton('shibuyakosuke-laravel-jet-adminlte', function ($app) {
            return new JetAdminLte($app);
        });
    }

    /**
     * @return void
     * @see https://github.com/diglactic/laravel-breadcrumbs
     */
    private function setBreadcrumbs(): void
    {
        /** @var Repository $config */
        $config = $this->app['config'];

        // For AdminLTE 3
        $config->set('breadcrumbs.view', 'jet-adminlte::breadcrumbs');

        // Disabled exception
        $config->set('breadcrumbs.missing-route-bound-breadcrumb-exception', false);
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            'shibuyakosuke.laravel-jet-adminlte'
        ];
    }
}
