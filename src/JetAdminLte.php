<?php

namespace ShibuyaKosuke\LaravelJetAdminlte;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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
     * @var array
     */
    private array $menu;

    /**
     * @var Router
     */
    private Router $routes;

    /**
     * @param Application $app
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(Application $app)
    {
        /** @var Application app */
        $this->app = $app;

        /** @var Repository $config */
        $config = $app->get('config');

        /** @var array config */
        $this->config = $config['jet_adminlte'];

        /** @var array menu */
        $this->menu = $config['jet_adminlte_menu'];

        /** @var Router route */
        $this->routes = $app->get('router');
    }

    /**
     * Find the path to a localized Markdown resource.
     *
     * @param string $name
     * @return string|null
     */
    public static function localizedMarkdownPath(string $name): ?string
    {
        $localName = preg_replace('#(\.md)$#i', '.' . app()->getLocale() . '$1', $name);

        return Arr::first([
            resource_path('markdown/' . $localName),
            resource_path('markdown/' . $name),
        ], function ($path) {
            return file_exists($path);
        });
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
     * @param string $key
     * @return array|string
     */
    protected function config(string $key)
    {
        return Arr::get($this->config, $key);
    }

    /**
     * Get title
     * @param string|null $routeName
     * @return string
     */
    public function title(string $routeName = null): string
    {
        $routeName = $routeName ?: $this->routes->currentRouteName();
        return trans("pages.{$routeName}");
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
     * @return string
     */
    public function layoutStyle(): string
    {
        return implode(' ', $this->config('layout.style'));
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
     * @return boolean
     */
    public function hasTermsAndPrivacyPolicyFeature(): bool
    {
        return $this->config('feature.terms_and_privacy');
    }

    /**
     * Get Social services
     * @param boolean $bool
     * @return array
     */
    public function socialServices(bool $bool = true): array
    {
        $services = $this->config('social-service');
        if ($bool === false) {
            return $services;
        }
        return array_filter($services, function ($service) {
            return $service;
        });
    }

    /**
     * @return boolean
     */
    public function hasBreadcrumbs(): bool
    {
        return $this->config('feature.breadcrumbs');
    }

    /**
     * @return boolean
     */
    public function hasSocialLoginFeature(): bool
    {
        return $this->config('feature.oauth-login');
    }

    /**
     * @return boolean
     */
    public function hasTwoFactorFeature(): bool
    {
        return $this->config('feature.two-factor');
    }

    /**
     * @param string $tag
     * @return array|string
     */
    public function smallText(string $tag)
    {
        return $this->config('layout.small-text.' . $tag);
    }

    /**
     * @return array|string
     */
    public function headerFixed()
    {
        return $this->config('layout.header.fixed');
    }

    /**
     * @return array|string
     */
    public function headerDropdownLegacyOffset()
    {
        return $this->config('layout.header.dropdown-legacy-offset');
    }

    /**
     * @return array|string
     */
    public function headerNoBorder()
    {
        return $this->config('layout.header.no-border');
    }

    /**
     * @return array|string
     */
    public function sidebarCollapsed()
    {
        return $this->config('layout.sidebar.collapsed');
    }

    /**
     * @return array|string
     */
    public function sidebarFixed()
    {
        return $this->config('layout.sidebar.fixed');
    }

    /**
     * @return array|string
     */
    public function sidebarMini()
    {
        return $this->config('layout.sidebar.sidebar-mini');
    }

    /**
     * @return array|string
     */
    public function sidebarMiniMd()
    {
        return $this->config('layout.sidebar.sidebar-mini-md');
    }

    /**
     * @return array|string
     */
    public function sidebarMiniXs()
    {
        return $this->config('layout.sidebar.sidebar-mini-xs');
    }

    /**
     * @return array|string
     */
    public function navFlatStyle()
    {
        return $this->config('layout.sidebar.nav-flat-style');
    }

    /**
     * @return array|string
     */
    public function navLegacyStyle()
    {
        return $this->config('layout.sidebar.nav-legacy-style');
    }

    /**
     * @return array|string
     */
    public function navCompact()
    {
        return $this->config('layout.sidebar.nav-compact');
    }

    /**
     * @return array|string
     */
    public function navChildIndent()
    {
        return $this->config('layout.sidebar.nav-child-indent');
    }

    /**
     * @return array|string
     */
    public function navChildHideOnCollapse()
    {
        return $this->config('layout.sidebar.nav-child-hide-on-collapse');
    }

    /**
     * @return array|string
     */
    public function disableHoverOrFocusAutoExpand()
    {
        return $this->config('layout.sidebar.disable-hover-focus-expand');
    }

    /**
     * @return array
     */
    public function mainMenu(): array
    {
        return Arr::get($this->menu, 'main-menu');
    }
}
