<?php

namespace ShibuyaKosuke\LaravelJetAdminlte;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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
     * Get Dark-mode
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
     * Get language setting
     * @return string
     */
    public function lang(): string
    {
        return str_replace('_', '-', $this->app->getLocale());
    }

    /**
     * Get version
     * @return string
     */
    public function version(): string
    {
        return $this->config('version');
    }

    /**
     * Get title
     * @return string
     */
    public function title(): string
    {
        $routeName = $this->routes->currentRouteName();
        return trans("pages.{$routeName}");
    }

    /**
     * Get background color for navbar
     * @return string
     */
    public function backgroundColorNavbar(): string
    {
        return $this->config('layout.background-color.navbar');
    }

    /**
     * Get background color for sidebar
     * @return string
     */
    public function backgroundColorSidebar(): string
    {
        return $this->config('layout.background-color.sidebar');
    }

    /**
     * Get Social services
     * @param string|null $service
     * @return array
     */
    public function socialServices(string $service = null)
    {
        return $this->config('social-service' . ($service ? ".{$service}" : ''));
    }

    /**
     * @return boolean
     */
    public function hasTermsAndPrivacyPolicyFeature(): bool
    {
        return $this->config('feature.terms_and_privacy');
    }

    /**
     * Get data for current breadcrumbs
     * @return Collection
     */
    public function breadcrumbs(): Collection
    {
        if ($this->request->getRealMethod() !== 'GET') {
            return collect();
        }

        /** @var Route $currentRoute */
        if (!$this->routes->current()) {
            return collect();
        }

        $currentRouteName = $this->routes->currentRouteName();
        if (is_null($currentRouteName)) {
            return collect();
        }

        return collect([
            'home',
            'example'
        ]);
    }

    /**
     * Find the path to a localized Markdown resource.
     *
     * @param string $name
     * @return string|null
     */
    public static function localizedMarkdownPath($name)
    {
        $localName = preg_replace('#(\.md)$#i', '.' . app()->getLocale() . '$1', $name);

        return Arr::first([
            resource_path('markdown/' . $localName),
            resource_path('markdown/' . $name),
        ], function ($path) {
            return file_exists($path);
        });
    }
}
