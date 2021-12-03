<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Test;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use ShibuyaKosuke\LaravelJetAdminlte\Providers\EventServiceProvider;
use ShibuyaKosuke\LaravelJetAdminlte\Providers\ServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            EventServiceProvider::class,
        ];
    }
}
