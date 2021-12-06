<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Facades;

use Illuminate\Support\Facades\Facade;

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
