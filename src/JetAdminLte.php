<?php

namespace ShibuyaKosuke\LaravelJetAdminlte;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use ShibuyaKosuke\LaravelJetAdminlte\Exceptions\JetAdminLteException;

class JetAdminLte
{
    /**
     * @var Application
     */
    private Application $app;

    /**
     * @var array
     */
    private array $config;

    /**
     * @var Router
     */
    private Router $routes;

    /**
     * @var Request
     */
    private Request $request;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        /** @var Application app */
        $this->app = $app;

        /** @var Repository $config */
        $config = $app->get('config');

        /** @var array config */
        $this->config = $config['jet_adminlte'];

        /** @var Router route */
        $this->routes = $app->get('router');

        /** @var Request $request */
        $this->request = $this->app->get('request');
    }

    /**
     * @param string $key
     * @return array|string
     */
    protected function config(string $key)
    {
        return Arr::get($this->config, $key);
    }

    /**
     * @return string|null
     */
    public function mode(): ?string
    {
        if ($this->config('layout.dark-mode')) {
            return 'dark-mode';
        }
        return null;
    }

    /**
     * @return string
     */
    public function lang(): string
    {
        return str_replace('_', '-', $this->app->getLocale());
    }

    /**
     * @return string
     */
    public function copyright(): string
    {
        return $this->config('copyright');
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return $this->config('version');
    }

    /**
     * @return string
     */
    public function backgroundColorNavbar(): string
    {
        return $this->config('layout.background-color.navbar');
    }

    /**
     * @return string
     */
    public function backgroundColorSidebar(): string
    {
        return $this->config('layout.background-color.sidebar');
    }

    /**
     * @param string $service
     * @return boolean
     */
    public function socialServices(string $service): bool
    {
        return $this->config('social-service.' . $service);
    }

    /**
     * Get data for current breadcrumbs
     * @return Collection
     * @throws JetAdminLteException
     */
    public function breadcrumbs(): Collection
    {
        if ($this->request->getRealMethod() !== 'GET') {
            return collect();
        }

        /** @var Route $currentRoute */
        if (!$currentRoute = $this->routes->current()) {
            return collect();
        }

        $currentRouteName = $currentRoute->getName();
        if (is_null($currentRouteName)) {
            return collect();
        }

        return collect([
            'home',
            'example'
        ]);
    }
}
