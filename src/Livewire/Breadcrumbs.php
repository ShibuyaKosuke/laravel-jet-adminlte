<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Breadcrumbs extends Component
{
    private $breadcrumbs;

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->breadcrumbs = \JetAdminLte::breadcrumbs();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('jet-adminlte::components.widget.breadcrumbs', [
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }
}
