<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;

class BreadcrumbComposer
{
    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with([
            'breadcrumbs' => JetAdminLte::breadcrumbs()
        ]);
    }
}
