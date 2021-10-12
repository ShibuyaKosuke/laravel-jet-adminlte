<?php

namespace ShibuyaKosuke\LaravelJetAdminlte;

use Illuminate\Routing\Route;

class Breadcrumb
{
    private string $url;
    private string $name;
    private bool $is_current;

    /**
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->url = $route->uri();
        $this->name = $route->getName();
    }
}
