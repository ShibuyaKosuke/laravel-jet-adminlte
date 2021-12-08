<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string backgroundColorNavbar()
 * @method static string backgroundColorSidebar()
 * @method static array|string config(string $key)
 * @method static array|string disableHoverOrFocusAutoExpand()
 * @method static boolean hasBreadcrumbs()
 * @method static boolean hasSocialLoginFeature()
 * @method static boolean hasTermsAndPrivacyPolicyFeature()
 * @method static boolean hasTwoFactorFeature()
 * @method static array|string headerDropdownLegacyOffset()
 * @method static array|string headerFixed()
 * @method static array|string headerNoBorder()
 * @method static string lang()
 * @method static string layoutStyle()
 * @method static string|null localizedMarkdownPath()
 * @method static array mainMenu()
 * @method static string|null mode()
 * @method static array|string navChildHideOnCollapse()
 * @method static array|string navChildIndent()
 * @method static array|string navCompact()
 * @method static array|string navFlatStyle()
 * @method static array|string navLegacyStyle()
 * @method static array|string sidebarCollapsed()
 * @method static array|string sidebarFixed()
 * @method static array|string sidebarMenu()
 * @method static array|string sidebarMini()
 * @method static array|string sidebarMiniMd()
 * @method static array|string sidebarMiniXs()
 * @method static array|string smallText(string $tag)
 * @method static array socialServices(bool $bool = true)
 * @method static string title(string $routeName = null)
 * @method static string version
 */
class JetAdminLte extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \ShibuyaKosuke\LaravelJetAdminlte\JetAdminLte::class;
    }
}
