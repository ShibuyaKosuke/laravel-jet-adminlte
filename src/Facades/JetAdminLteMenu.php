<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Lavary\Menu\Builder;

/**
 * @method static bool exists($name)
 * @method static Builder makeOnce($name, $callback)
 * @method static array loadConf($name)
 * @method static Builder get($key)
 * @method static Collection getCollection()
 * @method static Collection all()
 * @method static Collection make($name, $callback, array $options = [])
 */
class JetAdminLteMenu extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \ShibuyaKosuke\LaravelJetAdminlte\Menu\JetAdminLteMenu::class;
    }
}
