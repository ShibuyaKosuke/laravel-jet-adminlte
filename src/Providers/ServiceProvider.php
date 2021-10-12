<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use Livewire\Livewire;
use ShibuyaKosuke\LaravelJetAdminlte\Console\InstallCommand;
use ShibuyaKosuke\LaravelJetAdminlte\Console\MakeAdminlte;
use ShibuyaKosuke\LaravelJetAdminlte\Http\ViewComposers\BreadcrumbComposer;
use ShibuyaKosuke\LaravelJetAdminlte\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Livewire\Breadcrumbs;

class ServiceProvider extends ServiceProviderBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        // view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'jet-adminlte');

        // lang
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'jet-adminlte');

        // Components
        $this->loadViewComponents();

        // ViewComposer
        $this->loadViewComposers();

        // publish config files
        $this->registerPublishes();

        // Command
        $this->registerCommand();
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
    protected function loadViewComposers(): void
    {
        View::composers([
            BreadcrumbComposer::class => '*',
        ]);
    }

    /**
     * @return void
     */
    public function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/jet_adminlte.php' => config_path('jet_adminlte.php'),
        ], 'jet-adminlte-config');

        $this->publishes([
            __DIR__ . '/../../resources/views/components' => resource_path('views/vendor/jet-adminlte/components'),
        ], 'jet-adminlte-components');

        $this->publishes([
            __DIR__ . '/../../resources/views/layouts' => resource_path('views/layouts'),
        ], 'jet-adminlte-layouts');
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

        $this->app->singleton('shibuyakosuke-laravel-jet-adminlte', function ($app) {
            return new JetAdminLte($app);
        });
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
