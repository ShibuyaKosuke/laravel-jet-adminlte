<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Test;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ServiceProviderTest extends TestCase
{
    /**
     * Check that the main views are loaded.
     * @return void
     */
    public function testBootLoadViews(): void
    {
        $this->assertTrue(View::exists('jet-adminlte::auth.confirm-password'));
        $this->assertTrue(View::exists('jet-adminlte::auth.forgot-password'));
        $this->assertTrue(View::exists('jet-adminlte::auth.login'));
        $this->assertTrue(View::exists('jet-adminlte::auth.register'));
        $this->assertTrue(View::exists('jet-adminlte::auth.reset-password'));
        $this->assertTrue(View::exists('jet-adminlte::auth.two-factor-challenge'));
        $this->assertTrue(View::exists('jet-adminlte::dashboard'));
        $this->assertTrue(View::exists('jet-adminlte::policy'));
        $this->assertTrue(View::exists('jet-adminlte::terms'));
        $this->assertTrue(View::exists('jet-adminlte::welcome'));
    }

    /**
     * Check that config values are loaded.
     * @return void
     */
    public function testBootLoadConfig(): void
    {
        $this->assertTrue(Config::has('jet_adminlte.feature.terms_and_privacy'));
        $this->assertFalse(Config::get('jet_adminlte.feature.terms_and_privacy'));
        $this->assertTrue(Config::has('jet_adminlte.layout.dark-mode'));
    }

    /**
     * Check that the artisan commands are registered.
     * @return void
     */
    public function testBootRegisterCommands(): void
    {
        $commands = Artisan::all();
        $this->assertTrue(Arr::has($commands, 'jet-adminlte:install'));
        $this->assertTrue(Arr::has($commands, 'jet-adminlte:make'));
    }

    /**
     * Check that routes are registered.
     * @return void
     */
    public function testBootRegisterRoutes(): void
    {
        $routes = Route::getRoutes();
        $this->assertTrue($routes->hasNamedRoute('password.confirm'));
        $this->assertTrue($routes->hasNamedRoute('verification.send'));
        $this->assertTrue($routes->hasNamedRoute('verification.notice'));
        $this->assertTrue($routes->hasNamedRoute('verification.verify'));
        $this->assertTrue($routes->hasNamedRoute('password.request'));
        $this->assertTrue($routes->hasNamedRoute('password.email'));
        $this->assertTrue($routes->hasNamedRoute('login'));
        $this->assertTrue($routes->hasNamedRoute('oauth'));
        $this->assertTrue($routes->hasNamedRoute('oauth.callback'));
        $this->assertTrue($routes->hasNamedRoute('logout'));
        $this->assertTrue($routes->hasNamedRoute('register'));
        $this->assertTrue($routes->hasNamedRoute('password.update'));
        $this->assertTrue($routes->hasNamedRoute('password.reset'));
        $this->assertTrue($routes->hasNamedRoute('verification.notice'));
        $this->assertTrue($routes->hasNamedRoute('verification.verify'));
    }
}
