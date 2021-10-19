<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Test;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use ShibuyaKosuke\LaravelJetAdminlte\Providers\ServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}
