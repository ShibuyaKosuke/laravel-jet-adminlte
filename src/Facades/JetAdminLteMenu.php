<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Facades;

use Illuminate\Support\Facades\Facade;

class JetAdminLteMenu extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ShibuyaKosuke\LaravelJetAdminlte\JetAdminLteMenu::class;
    }
}
